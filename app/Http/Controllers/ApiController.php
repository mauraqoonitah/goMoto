<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class ApiController extends Controller
{
    public function manipulateGoMotoJson(){
        $booking_json = json_decode(File::get('../resources/jsondata/source_1.json'), true);
        $workshops_json = json_decode(File::get('../resources/jsondata/source_2.json'), true);
        $manipulated_json = [
            'status' => 1,
            'message' => 'Data Successfully Retrieved',
            'data' => [],
        ];
        // Iterate through the data from the booking_json file
        foreach ($booking_json['data'] as $dataBooking) {

            if(isset($dataBooking['booking'])){
                $booking_number = $dataBooking['booking']['booking_number'];
                $book_date = $dataBooking['booking']['book_date'];
                if(isset($dataBooking['booking']['motorcycle'])){
                    $motorcycle_ut_code = $dataBooking['booking']['motorcycle']['ut_code'];
                    $motorcycle = $dataBooking['booking']['motorcycle']['name'];
                }
            }
            // Find the matching booking_json data in the workshops_json file based on 'booking.workshop.code'
            $get_matching_workshop_code = array_filter($workshops_json['data'], function ($dataWorkshop) use ($dataBooking) {
                return $dataWorkshop['code'] === $dataBooking['booking']['workshop']['code'];
            });
            
            // If a matching workshop code is found, merge the data
            if (!empty($get_matching_workshop_code)) {
                //  reset() used to get the first element of an array.
                $workshop_data_to_merge = reset($get_matching_workshop_code); // Get the first workshop code (assuming there's only one)

                // Merge the data
                $MergedBookingData = array_merge(
                    $dataBooking,
                    [
                        'booking_number' => $booking_number,
                        'book_date' => $book_date,
                        'ahass_code' => $workshop_data_to_merge['code'],
                        'ahass_name' => $workshop_data_to_merge['name'],
                        'ahass_address' => $workshop_data_to_merge['address'],
                        'ahass_contact' => $workshop_data_to_merge['phone_number'],
                        'ahass_distance' => $workshop_data_to_merge['distance'],
                        'motorcycle_ut_code' => $motorcycle_ut_code,
                        'motorcycle' => $motorcycle
                    ]
                );
                unset($MergedBookingData['booking']);
                $manipulated_json['data'][] = $MergedBookingData;

            }
        }
          return response()->json($manipulated_json);
    }
}
