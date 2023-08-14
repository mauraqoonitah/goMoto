<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workshop;
use File;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workshop::truncate();

        $json = File::get("./resources/jsondata/source_2.json");
        $response_data = json_decode($json, true);
        $workshops = $response_data['data'];
  
        foreach ($workshops as $key => $value) {
            Workshop::create([
                "code" => $value['code'],
                "name" => $value['name'],
                "address" => $value['address'],
                "phone_number" => $value['phone_number'],
                "distance" => $value['distance'],
            ]);
        }

    }
}
