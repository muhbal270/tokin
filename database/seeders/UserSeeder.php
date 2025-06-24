<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'user',
            'phone' => '08123456789',
            'email' => 'user@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
