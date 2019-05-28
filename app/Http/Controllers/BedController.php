<?php

namespace App\Http\Controllers;

use App\Bed;
use Illuminate\Http\Request;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beds = Bed::all();

        return view('admin.beds.index', compact('beds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.beds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->large == 0 || $request->small == 0) {

            return redirect()->back()->with('status','Вибачте, але інформацію було введено не коректно');
        }
        if(Bed::where('large', $request->large)
        ->where('small',$request->small)
        ->first()->count() != 0) {

            return redirect()->back()->with('status','Дана категорія вже створена');
        }
        Bed::add($request->all());

        return redirect()->back()->with('status', "Ви вдало добавили тип ліжка");
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
    public function edit(Bed $bed)
    {
        $large = $bed->large();
        $small = $bed->small();

        return view('admin.beds.edit',['bed'=>$bed, 'large'=>$large, 'small'=>$small]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->large == 0 || $request->small == 0) {

            return redirect()->back()->with('status','Вибачте, але інформацію було введено не коректно');
        }
        if(Bed::where('large', $request->large)
                ->where('small',$request->small)
                ->first()->count() != 0) {

            return redirect()->back()->with('status','Дана категорія вже створена');
        }

        $bed = Bed::findOrFail($id);
        $bed->edit($request->all());

        return redirect()->route('bed.index')->with('status','Ви вдало змінили категорію типа ліжка');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bed::findOrFail($id)->delete();

        return redirect()->back()->with('status','Ви вдало видалили категорію');
    }
}
