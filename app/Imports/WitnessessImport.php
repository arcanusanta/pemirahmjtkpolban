<?php

namespace App\Imports;

use App\Models\Grade;
use App\Models\StudyProgram;
use App\Models\Witness;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WitnessessImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            $Witness = Witness::where('nim', $row['nim'])->first();

            $StudyProgram = StudyProgram::where('name', $row['study_program'])->get()->first();
            $Grade = Grade::where('name', $row['grade'])->get()->first();

            if($Witness) {
                Witness::where('nim', $row['nim'])->update([
                    'name' => $row['name'],
                    'study_program_id' => optional($StudyProgram)->id,
                    'grade_id' => optional($Grade)->id,
                    'year' => $row['year'],
                    'email' => $row['email'],
                    'password' => Hash::make($row['password']),
                ])->assignRole('Witness');
            } else {
                Witness::create([
                    'nim' => $row['nim'],
                    'name' => $row['name'],
                    'study_program_id' => optional($StudyProgram)->id,
                    'grade_id' => optional($Grade)->id,
                    'year' => $row['year'],
                    'email' => $row['email'],
                    'password' => Hash::make($row['password']),
                ])->assignRole('Witness');
            }
        }
    }
}
