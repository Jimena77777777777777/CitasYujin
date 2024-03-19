<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'yujin',
            'email' => 'yujin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            
            'cedula' => '77150803',
            'address' => 'Av. Coreanos Encuerados ',
            'phone' => '935868041',
            'role' => 'admin',
        ]);
        User::factory()
            ->count(50)
            ->create();
    }
}