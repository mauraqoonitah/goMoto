<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = Workshop::orderBy('id','asc')->get();

        return view('workshop.index',[
            'workshops' => $workshops,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workshop.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'unique:workshops',],
            'name' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
            'distance' => ['required'],
        ]);

        $workshop = Workshop::create($request->all());

        return redirect()->route('workshop.index')->withSuccess(__('Workshop created successfully.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function show(Workshop $workshop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Workshop $workshop)
    {
        return view('workshop.edit',[
            'workshop' => $workshop,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workshop $workshop)
    {

        $workshop->code = $request->code;
        $workshop->name = $request->name;
        $workshop->address = $request->address;
        $workshop->phone_number = $request->phone_number;
        $workshop->distance = $request->distance;
        $workshop->save();
        return redirect()->route('workshop.index')->withSuccess(__('Workshop updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshop $workshop)
    {
        $workshop->delete();
        return redirect()->route('workshop.index')->withSuccess(__('Workshop deleted successfully.'));
    }
    
}
