<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoterRequest;
use App\Models\Grade;
use App\Models\StudyProgram;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class VoterController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $Data = Voter::join('study_programs', 'study_programs.id', '=', 'voters.study_program_id')->join('grades', 'grades.id', '=', 'voters.grade_id')->select('voters.*', 'study_programs.name AS study_program_name', 'grades.name AS grade_name')->get();

            return DataTables::of($Data)->addIndexColumn()->addColumn('action', 'master.voter.action')->rawColumns(['action'])->make(true);
        }

        $Title = "Pemilih";

        return view('master.voter.index', compact('Title'));
    }

    public function create()
    {
        $Title = "Tambah Pemilih";
        $StudyPrograms = StudyProgram::all();
        $Grades = Grade::all();

        return view('master.voter.create', compact('Title', 'StudyPrograms', 'Grades'));
    }

    public function store(StoreVoterRequest $Request)
    {
        try {
            Voter::create([
                'nim' => $Request->nim,
                'name' => $Request->name,
                'study_program_id' => $Request->study_program,
                'grade_id' => $Request->grade,
                'year' => $Request->year,
                'email' => $Request->email,
                'status' => 'AKTIF',
                'election_status' => 'Belum Memilih',
                'password' => Hash::make($Request->password),
            ])->assignRole('Voter');

            Alert::success('Selamat', 'Anda telah berhasil menambahkan data');
            return redirect()->route('voter.data.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('voter.data.index');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        try {
            Voter::where('id', $id)->delete();

            Alert::success('Selamat', 'Anda telah berhasil menghapus data');
            return redirect()->route('voter.data.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('voter.data.index');
        }
    }
}
