<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageState;
use App\State;

class CategorogyforstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();

        return view('admin.state.index',['states'=>$states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.state.create');
    }

    /**
     * @param StorageState $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(StorageState $request)
    {
        $integer = (integer) $request->state;
        if($integer != 0) {
          return redirect()->back()->with('status','Ви ввели число');
        }

        if(State::where(mb_strtolower('state'),mb_strtolower($request->state))
        ->get()->count() != 0) {

            return redirect()->back()->with('status','Дану категорію вже було створено');
        }

        State::add($request->all());

        return redirect()->back()->with('status','Ваш стан успішно добавлений');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {

        return view('admin.state.edit')->with('state',$state);
    }


    /**
     * @param StorageState $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(StorageState $request, $id)
    {
        $integer = (integer) $request->state;
        if($integer != 0) {
          return redirect()->back()->with('status','Ви ввели число');
        }

        if(State::where(mb_strtolower('state'),mb_strtolower($request->state))
                ->get()->count() != 0) {

            return redirect()->back()->with('status','Дану категорію вже було створено');
        }

        $state = State::find($id);
        $state->edit($request->all());

        return redirect()->back()->with('status','Ваш стан успішно змінений');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        State::findOrFail($id)->delete();

        return redirect()->back()->with('status','Ви вдало видалили стан');
    }
}
