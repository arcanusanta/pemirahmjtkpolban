<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $Administrator = Role::create(['name' => 'Administrator']);
        $Operator = Role::create(['name' => 'Operator']);
        $Witness = Role::create(['name' => 'Witness']);
        $Voters = Role::create(['name' => 'Voters']);
    }
}
