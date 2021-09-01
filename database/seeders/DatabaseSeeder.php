<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Janith Gihan',//Str::random(10),
            'email' => 'janith@gmail.com',//Str::random(10).'@gmail.com', 
            'gender'=>'m',
            'address' =>'Pitihuma Kegalle',
            'mobile' => '07119932',
	        'password' => Hash::make('test123'),            
	        'remember_token' => Str::random(10), ]);
        // \App\Models\User::factory(10)->create();
    }
}
