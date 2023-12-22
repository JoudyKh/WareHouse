<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $numberOfUsers = 100000;
        User::factory($numberOfUsers)->create();
    }
}
// User::create([
//     'id' => auth()->user()->id,
//     'first_name' => auth()->user()->first_name,
//     'last_name' => auth()->user()->last_name,
//     'phone_number' => auth()->user()->phone_number,
//     'password' => auth()->user()->password,
//     'email' => auth()->user()->email,
//     'address' => auth()->user()->address,
//     'store_name' => auth()->user()->store_name,
//     'created_at' => auth()->user()->created_at,
//     'updated_at' => auth()->user()->updated_at,
//     'role' => auth()->user()->role
// ]);