<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Thomas',
                'email' => 'tom@example.com',
                'password' => Hash::make('tomaseka123'),
                'level' => 3,
                'isActive' => 1,
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password123'),
                'level' => 3,
                'isActive' => 1,
            ],
            [
                'name' => 'Eka Swastika',
                'email' => 'swastika@gmail.com',
                'password' => Hash::make('swastikaputra'),
                'level' => 3,
                'isActive' => 0,
            ],
            [
                'name' => 'Admin Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('adminadmin'),
                'level' => 1,
                'isActive' => 1,
            ],
            [
                'name' => 'Employee Cashier',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('employeecashier'),
                'level' => 2,
                'isActive' => 1,
            ],
            // Add more users as needed
        ]);
    }
}
