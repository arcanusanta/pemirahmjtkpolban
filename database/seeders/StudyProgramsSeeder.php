<?php

namespace Database\Seeders;

use App\Models\StudyProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyProgramsSeeder extends Seeder
{
    public function run(): void
    {
        StudyProgram::create(['name' => 'D3 - Teknik Kimia']);
        StudyProgram::create(['name' => 'D4 - Teknik Kimia Produksi Bersih']);
        StudyProgram::create(['name' => 'D3 - Analis Kimia']);
    }
}
