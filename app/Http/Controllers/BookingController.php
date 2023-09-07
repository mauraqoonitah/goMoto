<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Motorcycle;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Str;
use App\Jobs\BookingEmailJob;

use App\Mail\BookingMail;
use Mail;

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
    public function show($user_id)
    {
        $bookings = Booking::with('workshops.motorcycles')->where('user_id', $user_id)->orderBy('updated_at','desc')->get();

        return view('booking.show', [
            'bookings' => $bookings,
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
        $bookings = Booking::with('workshops.motorcycles')->where('id', $id)->first();
        return view('booking.edit', [
            'bookings' => $bookings,
        ]);
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
     * @param  \App\Models\Booking  $Booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $startime = microtime(true);
        $data = [
            'email' => $booking->user->email,
            'user_id' => $booking->user->id,
            'booking_id' => $booking->id,
        ];
        
        $booking->update([
            'status'=>'canceled'
        ]);

        dispatch(new BookingEmailJob($data));
        
        return redirect()->back()->withSuccess(__(' Success! please check your email for details. '));

        // $endtime = microtime(true);
        // $timediff = $endtime - $startime;
        // return redirect()->back()->withSuccess(__(' Success! ' . sprintf('%0.6f', $timediff)));

        // $booking->delete();
        // return redirect()->back()->withSuccess(__('Booking canceled successfully.'));
    }
}
