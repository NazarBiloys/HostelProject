<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageOrder;
use App\Room;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function store()
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $rooms = Room::all();

        return view('admin.orders.edit',compact('order','rooms'));
    }

    /**
     * @param StorageOrder $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StorageOrder $request, $id)
    {
        if ($request->from >= $request->to) {
            return redirect()->back()->with('status', 'Ви ввели не коректну інформацію');
        }

        $order = Order::findOrFail($id);
        if (Order::where('rooms_id', $order->rooms->id)
                ->where('from', '<', $request->to)
                ->where('to', '>', $request->from)
                ->get()->count() != 0) {
            return redirect()->back()->with('status', 'Вибачте, але дана дата не підходить для цього номеру');
        }
        $order->edit($request->all());
        $order->save();

        return redirect('/show/order')->with('status','Ви вдало змінили замовлення');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrFail($id)->remove();

        return redirect()->back()->with('status','Ви вдало видалили замовлення');
    }
}
