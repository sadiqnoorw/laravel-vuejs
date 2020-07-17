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
        $users = App\User::create([
            'name' => 'Sadiq Noor',
            'email' => 'sadiq.pk33@gmail.com',
            'password' => Hash::make('sadiq123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);


        $users->restaurants()->create([
            'name' => 'Highway Star',
            'location' => 'shazed Road, Diera dubai',
        ]);

        $users->restaurants()->create([
            'name' => 'Mainland China',
            'location' => 'Platinum Tech Park Vashi, Navi dubai',
        ]);
        
        $users->restaurants()->create([
            'name' => 'Mukesh Lunch Home',
            'location' => 'Sai Balaji Tower, near Rigga metro',
        ]);


    }
}
