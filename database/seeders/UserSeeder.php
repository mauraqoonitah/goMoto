<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use File;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
       
        // create admin user
        User::insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'avatar' => null,
            'role' => 1,
            'password' => Hash::make('admin'),
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // create users
        $json = File::get("./resources/jsondata/source_1.json");
        $response_data = json_decode($json, true);
        $users = $response_data['data'];

        foreach ($users as $key => $value) {
            $user = User::where('email',$value['email'])->first();
            if(!$user){
                User::create([
                    'name' => $value['name'],
                    'email' => $value['email'],
                    'avatar' => null,
                    'role' => 2,
                    'password' => Hash::make('password'),
                    'email_verified_at' => Carbon::now(),
                    'remember_token' => Str::random(10),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
           
        }
    }
}
