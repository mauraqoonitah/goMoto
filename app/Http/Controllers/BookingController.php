<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Motorcycle;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Str;

class BookingController extends Controller
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
        $workshop_id = $request->workshop_id;
        $motorcycle_id = $request->motorcycle_id;
        $user_id = Auth::user()->id;
        $booking_number = rand(0, 999999999999);
        $book_date = $request->book_date;

        Booking::create([
            'workshop_id' => $workshop_id,
            'motorcycle_id' => $motorcycle_id,
            'user_id' => $user_id,
            'booking_number' => $booking_number,
            'book_date' => $book_date,
        ]);

        return redirect()->back()->withSuccess(__('Your Appointment Has Been Confirmed!'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
