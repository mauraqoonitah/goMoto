<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Motorcycle;
use App\Models\Workshop;
use File;

class MotorcycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Motorcycle::truncate();

        $json = File::get("./resources/jsondata/source_1.json");
        $response_data = json_decode($json, true);
        $motorcycles = $response_data['data'];
  
        foreach ($motorcycles as $key => $value) {
            $workshop =  Workshop::where('code', $value['booking']['workshop']['code'])->first();
            if($workshop){
                $workshop_id = $workshop['id'];
                Motorcycle::create([
                    "workshop_id" => $workshop_id,
                    "name" => $value['booking']['motorcycle']['name'],
                    "ut_code" => $value['booking']['motorcycle']['ut_code'],
                ]);
            }
        }
    }
}
