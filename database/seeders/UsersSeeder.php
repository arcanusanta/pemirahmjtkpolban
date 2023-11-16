<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator Pemira HMJTK POLBAN',
            'email' => 'administrator@pemirahmjtkpolban.my.id',
            'email_verified_at' => now(),
            'password' => Hash::make('zGUh4M?R3x8Tk%#@'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->assignRole('Administrator');

        User::create([
            'name' => 'Garly Nugraha',
            'email' => 'princegarll@pemirahmjtkpolban.my.id',
            'email_verified_at' => now(),
            'password' => Hash::make('uRKNjge*P(XUk5F4'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ])->assignRole('Operator');
    }
}
