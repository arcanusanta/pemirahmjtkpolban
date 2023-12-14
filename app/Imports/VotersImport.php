<?php

namespace App\Imports;

use App\Models\Grade;
use App\Models\StudyProgram;
use App\Models\Voter;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VotersImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            $Voter = Voter::where('nim', $row['nim'])->first();

            $StudyProgram = StudyProgram::where('name', $row['study_program'])->get()->first();
            $Grade = Grade::where('name', $row['grade'])->get()->first();

            if($Voter) {
                Voter::where('nim', $row['nim'])->update([
                    'name' => $row['name'],
                    'study_program_id' => optional($StudyProgram)->id,
                    'grade_id' => optional($Grade)->id,
                    'year' => $row['year'],
                    'email' => $row['email'],
                    'status' => $row['status'],
                    'start_time' => $row['start_time'],
                    'end_time' => $row['end_time'],
                    'election_status' => $row['election_status'],
                    'password' => Hash::make($row['password']),
                ])->assignRole('Voter');
            } else {
                Voter::create([
                    'nim' => $row['nim'],
                    'name' => $row['name'],
                    'study_program_id' => optional($StudyProgram)->id,
                    'grade_id' => optional($Grade)->id,
                    'year' => $row['year'],
                    'email' => $row['email'],
                    'status' => $row['status'],
                    'start_time' => $row['start_time'],
                    'end_time' => $row['end_time'],
                    'election_status' => $row['election_status'],
                    'password' => Hash::make($row['password']),
                ])->assignRole('Voter');
            }
        }
    }
}
