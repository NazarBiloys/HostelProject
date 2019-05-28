<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageService;
use App\Room;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\MailClass;

class ServiceController extends Controller
{
    public function index()
    {
        return view('service.index');
    }

    public function sauna()
    {
        return view('service.sauna');
    }

    public function swimingPool()
    {
        return view('service.swimingpool');
    }

    public function parking()
    {
        return view('service.parking');
    }

    public function restaurant()
    {
        return view('service.restaurant');
    }

    public function contact()
    {
        return view('layouts.information');
    }

    /**
     * @param StorageService $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(StorageService $request)
    {
        $name = $request->name;
        $email = $request->email;
        $messages = $request->messages;

        Mail::to('perlina@gmail.com')->send(new MailClass($name,$email,$messages));

        return redirect()->back()->with('status','Ваше повідомлення було вдало доставлено, очікуйте будь ласка');
    }

    public function bron()
    {
        return view('service.bron');
    }

    public function sortroom()
    {
        $rooms = Room::all();

        return view('layouts.sort',compact('rooms'));
    }

    public function sort(Request $request)
    {

        return redirect()->action($request->sort);
    }

    public function price()
    {
        $rooms = Room::orderBy('price')->get();

        return view('layouts.price',compact('rooms'));
    }

    public function available()
    {
        $rooms = Room::where('is',1)->get();

        return view('layouts.available',compact('rooms'));
    }
}