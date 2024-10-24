<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Diego Hurtado Vargas',
            'email' => 'diego@gmail.com',
            'password' => bcrypt('1234')
        ]);

        User::create([
            'name' => 'Erwin Prieto Pocholi',
            'email' => 'ewin@gmail.com',
            'password' => bcrypt('1234')
        ]);
    }
}
