<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Operator']);
        Role::create(['name' => 'Witness']);
        Role::create(['name' => 'Voter']);
    }
}
