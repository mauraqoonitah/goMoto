<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Motorcycle;
use App\Models\User;


class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $motorcycle = Motorcycle::create([
            'workshop_id' => $request->workshop_id,
            'name' => $request->name,
            'ut_code' => $request->ut_code,
        ]);
        return redirect()->route('motorcycle.show', $request->workshop_id)->withSuccess(__('Product created successfully.'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workshops = Workshop::with('motorcycles')->where('id',$id)->first();

        return view('motorcycle.show', [
            'workshops' => $workshops,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('motorcycle.edit',[

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motorcycle $motorcycle)
    {
        $motorcycle->name = $request->edit_name;
        $motorcycle->ut_code = $request->edit_ut_code;
        $motorcycle->save();
        return redirect()->back()->withSuccess(__('Motorcycle updated successfully.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motorcycle $motorcycle)
    {
        $motorcycle->delete();
        return redirect()->back()->withSuccess(__('Product deleted successfully.'));
    }
}
