<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWitnessRequest;
use App\Imports\WitnessessImport;
use App\Models\Grade;
use App\Models\StudyProgram;
use App\Models\Witness;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class WitnessController extends Controller
{
    function __construct() {
        $this->middleware('can:Witness - Read', ['only' => ['index','show']]);
        $this->middleware('can:Witness - Create', ['only' => ['create','store']]);
        $this->middleware('can:Witness - Update', ['only' => ['edit','update']]);
        $this->middleware('can:Witness - Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (request()->ajax()) {
            $Data = Witness::join('study_programs', 'study_programs.id', '=', 'witnesses.study_program_id')->join('grades', 'grades.id', '=', 'witnesses.grade_id')->select('witnesses.*', 'study_programs.name AS study_program_name', 'grades.name AS grade_name')->get();

            return DataTables::of($Data)->addIndexColumn()->addColumn('action', 'master.witness.action')->rawColumns(['action'])->make(true);
        }

        $Title = "Saksi";

        return view('master.witness.index', compact('Title'));
    }

    public function create()
    {
        $Title = "Tambah Saksi";
        $StudyPrograms = StudyProgram::all();
        $Grades = Grade::all();

        return view('master.witness.create', compact('Title', 'StudyPrograms', 'Grades'));
    }

    public function store(StoreWitnessRequest $Request)
    {
        try {
            Witness::create([
                'nim' => $Request->nim,
                'name' => $Request->name,
                'study_program_id' => $Request->study_program,
                'grade_id' => $Request->grade,
                'year' => $Request->year,
                'email' => $Request->email,
                'password' => Hash::make($Request->password),
            ])->assignRole('Witness');

            Alert::success('Selamat', 'Anda telah berhasil menambahkan data');
            return redirect()->route('witness.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('witness.index');
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
            Witness::where('id', $id)->delete();

            Alert::success('Selamat', 'Anda telah berhasil menghapus data');
            return redirect()->route('witness.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('witness.index');
        }
    }

    public function import(Request $Request){
        $Message = ['file.mimes' => 'Format File yang boleh diupload adalah .xls, .xlsx, atau .csv'];
        $Request->validate(['file' => 'file|mimes:xls,xlsx,csv'], $Message);

        Excel::import(new WitnessessImport, $Request->file('file')->store('temp'));

        Alert::success('Selamat', 'You\'ve Successfully Import Students Data');
        return redirect()->route('witness.index');
    }
}
