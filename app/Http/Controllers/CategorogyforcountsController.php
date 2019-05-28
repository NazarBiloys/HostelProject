<?php

namespace App\Http\Controllers;

use App\Count;
use App\Http\Requests\StorageCounts;

class CategorogyforcountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = Count::all();

        return view('admin.counts.index',compact('counts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.counts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StorageCounts $request)
    {
        if(Count::where('adult',$request->adult)
                ->where('children',$request->children)
                ->get()->count() != 0) {

            return redirect()->back()->with('status','Дана категорія вже була створена');
        }

        Count::add($request->all());

        return redirect()->back()->with('status','Категорія успішно добавлена');
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
    public function edit(Count $counts)
    {

        return view('admin.counts.edit',compact('counts'));
    }


    public function update(StorageCounts $request, $id)
    {
        if(Count::where('adult',$request->adult)
        ->where('children',$request->children)
        ->get()->count() != 0) {

            return redirect()->back()->with('status','Дана категорія вже була створена');
        }

        $counts = Count::findOrFail($id);
        $counts->edit($request->all());

        return redirect()->back()->with('status','Ви вдало змінили категорію');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Count::findOrFail($id)->remove();

        return redirect()->back()->with('status','Ви вдало видалили категорію');
    }
}
