<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VoterStatusController extends Controller
{
    function __construct() {
        $this->middleware('can:Election Status - Already', ['only' => ['already']]);
        $this->middleware('can:Election Status - Not Yet', ['only' => ['notyet']]);
    }

    public function already()
    {
        if (request()->ajax()) {
            $Query = Voter::join('study_programs', 'study_programs.id', '=', 'voters.study_program_id')->join('grades', 'grades.id', '=', 'voters.grade_id')->select('voters.*', 'study_programs.name AS study_program_name', 'grades.name AS grade_name')->where('voters.election_status', '=', 'Sudah Memilih')->get();

            return DataTables::of($Query)->make();
        }

        $Title = "Sudah Memilih";

        return view('master.voter.status.already', compact('Title'));
    }

    public function notyet()
    {
        if (request()->ajax()) {
            $Query = Voter::join('study_programs', 'study_programs.id', '=', 'voters.study_program_id')->join('grades', 'grades.id', '=', 'voters.grade_id')->select('voters.*', 'study_programs.name AS study_program_name', 'grades.name AS grade_name')->where('voters.election_status', '=', 'Belum Memilih')->get();

            return DataTables::of($Query)->make();
        }

        $Title = "Belum Memilih";

        return view('master.voter.status.notyet', compact('Title'));
    }
}
