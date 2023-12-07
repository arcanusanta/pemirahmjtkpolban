<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    public function run(): void
    {
        Grade::create(['name' => 'Kelas A']);
        Grade::create(['name' => 'Kelas B']);
        Grade::create(['name' => 'Kelas C']);
        Grade::create(['name' => 'Kelas D']);
    }
}
