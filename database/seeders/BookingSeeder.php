<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Workshop;
use App\Models\Motorcycle;
use File;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Booking::truncate();

        $json = File::get("./resources/jsondata/source_1.json");
        $response_data = json_decode($json, true);
        $data = $response_data['data'];
  
        foreach ($data as $key => $value) {
            $user_email = $value['email'];
            $check_user = User::where('email', $user_email)->first();
            if($check_user){
                $check_workshop = Workshop::where('code', $value['booking']['workshop']['code'])->first();
                if($check_workshop){
                    $check_motorcycle = Motorcycle::where('ut_code', $value['booking']['motorcycle']['ut_code'])->first();
                    if($check_motorcycle){
                        Booking::create([
                            "workshop_id" => $check_workshop['id'],
                            "motorcycle_id" => $check_motorcycle['id'],
                            "user_id" => $check_user['id'],
                            "booking_number" => $value['booking']['booking_number'],
                            "book_date" => $value['booking']['book_date'],
                        ]);
                    }
                }

            }

        }
    }
}
