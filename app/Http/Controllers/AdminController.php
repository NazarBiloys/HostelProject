<?php

namespace App\Http\Controllers;

use App\Count;
use App\Http\Requests\StorageRoom;
use App\State;
use App\Room;
use App\Bed;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function rooms()
    {
        $rooms = Room::all();

        return view('admin.rooms.index')->with('rooms',$rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        $counts = Count::all();
        $beds = Bed::all();

        return view('admin.rooms.create',compact('states','counts','beds'));
    }


    /**
     * @param StorageRoom $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorageRoom $request)
    {
        $room = Room::add($request->all());
        $room->uploadImage($request->file('photo'));

        if($request->input('counts')) :
            $room->counts()->attach($request->input('counts'));
            endif;

        return redirect()->route('admin.room')->with('status','Ви вдало добавили кімнату');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $states = State::all();
        $counts = Count::all();
        $beds = Bed::all();

        return view('admin.rooms.edit',compact('room','states','counts','beds'));
    }


    public function show(){
        return redirect()->back();
    }

    /**
     * @param StorageRoom $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StorageRoom $request,Room $room)
    {
        $room->edit($request->all());

        if(!$request->wifi)
        {
            $room->wifi = 0;
            $room->save();
        }

        if(!$request->tv)
        {
            $room->tv = 0;
            $room->save();
        }

        if(!$request->air_conditioning)
        {
            $room->air_conditioning = 0;
            $room->save();
        }

        $room->counts()->detach();
        if($request->input('counts')) :
            $room->counts()->attach($request->input('counts'));
            endif;

        return redirect()->route('admin.room')->with('status','Ви вдало змінили кімнату');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::find($id)->delete();

        return redirect()->route('admin.room')->with('status','Ви вдало видлали кімнату');
    }
}
