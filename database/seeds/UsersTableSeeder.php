<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
//use App\Restaurant;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Sadiq Noor',
            'email' => 'sadiq.pk33@gmail.com',
            'password' => Hash::make('sadiq123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user->restaurants()->create([
            'name' => 'Highway Star',
            'location' => 'Bhuvandas Road, NH14 Dadar, Mumbai',
        ]);

        $user->restaurants()->create([
            'name' => 'Mainland China',
            'location' => 'Platinum Tech Park Vashi, Navi Mumbai',
        ]);

        $user->restaurants()->create([
            'name' => 'Mukesh Lunch Home',
            'location' => 'Sai Balaji Tower, Airoli Navi Mumbai',
        ]);



    }
}
