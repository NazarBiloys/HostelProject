<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageOrder;
use App\Room;
use App\Count;
use App\State;
use App\Order;
use App\Mail\MailClass;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function bron()
    {
        $counts = Count::all();
        $states = State::all();
        $foradults = [];
        $forchildren = [];
        foreach ($counts as $count)
        {
            if(!in_array($count->adult, $foradults))
            {
                array_push($foradults,$count->adult);
            }
            if(!in_array($count->children, $forchildren))
            {
                 array_push($forchildren,$count->children);
            }
        }


        return view('auth.brons',['adults'=>$foradults,'childrens'=>$forchildren,'states'=>$states]);
    }

    public function store()
    {
        return redirect()->back();
    }

    /**
     * @param StorageOrder $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function order(StorageOrder $request)
    {
        $user_id = Auth::user()->id;
        $to = $request->to;
        $from = $request->from;

        if(Count::where('adult', $request->counts_adult)
            ->where('children', $request->counts_children)
            ->first() === null) {

            return redirect()->back()->with('status','Дана кілкість людей не підходить до жодної з кімнат');
        };

        $count = Count::where('adult', $request->counts_adult)
            ->where('children', $request->counts_children)
            ->first();

        if ($request->from >= $request->to) {
            return redirect()->back()->with('status', 'Ви ввели не коректну інформацію');
        }
        $rooms = [];
        foreach ($count->rooms as $room) {
                if ($room->orders()->count() === 0) {
                    $available = Room::where('id', $room->id)->get();

                    array_push($rooms,$available);
                } elseif (Order::where('rooms_id',$room->id)
                    ->where('from', '<', $request->to)
                    ->where('to', '>', $request->from)
                    ->get()->count() == 0) {
                    $available = Room::where('id', $room->id)->get();

                    array_push($rooms,$available);
                } elseif (\count($rooms) != 0 ) {
                    return view('auth.available', compact('rooms', 'user_id', 'to', 'from'));
                }
                else {
                    return redirect()->back()->with('status', 'Вибачте, але для Вас вільних номерів немає');
                }
            }

        return view('auth.available', compact('rooms', 'user_id', 'to', 'from'));
    }

    public function goorder($users_id,$room_id,$from,$to)
    {
        $fields = array('users_id'=>$users_id,'rooms_id'=>$room_id,'from'=>$from, 'to'=>$to);
        Order::add($fields);
        $name = Auth::user()->name;
        $email = Auth::user()->email;

        $messages = "Ви отрмали завмовлення від ". $name . ' Почта відправника '. $email . ' Замовлення від ' . $from . ' до ' . $to ;

        Mail::to('perlina@gmail.com')->send(new MailClass($name,$email,$messages));

        return redirect('/')->with('status','Ваше замовлення було вдало відправлено, очікуйте на відповідь');
    }

    public function ownbrons()
    {
        $orders = Order::where([['users_id',Auth::user()->id]])->get();

        return view('auth.ownorder',compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('auth.editorder',compact('order'));
    }

    /**
     * @param StorageOrder $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StorageOrder $request, Order $order)
    {
            if (Order::where('rooms_id', $order->rooms->id)
                    ->where('from', '<', $request->to)
                    ->where('to', '>', $request->from)
                    ->get()->count() != 0) {
                return redirect()->back()->with('status', 'Вибачте, але дана дата не підходить для цього номеру');
            }
            $order->update($request->all());

            $messages = "Користувач " . Auth::user()->name . ' Почта відправника ' . Auth::user()->email . ' Змінив своє замовлення на таку дату ' . $request->from . ' до ' . $request->to;

            Mail::to('perlina@gmail.com')->send(new MailClass(Auth::user()->name, Auth::user()->email, $messages));

            return redirect()->route('orders')->with('status', 'Ви вдало змінили замовлення');
        }

    public function destroy($id)
    {
        Order::findOrFail($id)->delete();

        $messages = "Користувач " . Auth::user()->name . ' Почта відправника ' . Auth::user()->email . ' Відмінив своє замовлення';

        Mail::to('perlina@gmail.com')->send(new MailClass(Auth::user()->name, Auth::user()->email, $messages));

        return redirect()->back()->with('status', 'Ви вдало відмінили замовлення');
    }


}
