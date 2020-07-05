<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
        	'name' => 'Sadiq Noor',
        	'email' => 'sadiq.pk33@gmail.com',
            'password' => Hash::make('sadiq123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
