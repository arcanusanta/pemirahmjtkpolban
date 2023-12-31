<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyProgramRequest;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class StudyProgramController extends Controller
{
    function __construct() {
        $this->middleware('can:Study Program - Read', ['only' => ['index','show']]);
        $this->middleware('can:Study Program - Create', ['only' => ['create','store']]);
        $this->middleware('can:Study Program - Update', ['only' => ['edit','update']]);
        $this->middleware('can:Study Program - Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (request()->ajax()) {
            $Data = StudyProgram::latest()->get();

            return DataTables::of($Data)->addIndexColumn()->addColumn('action', 'master.study-program.action')->rawColumns(['action'])->make(true);
        }

        $Title = "Program Studi";

        return view('master.study-program.index', compact('Title'));
    }

    public function create()
    {
        $Title = "Tambah Program Studi";

        return view('master.study-program.create', compact('Title'));
    }

    public function store(StudyProgramRequest $Request)
    {
        try {
            StudyProgram::create([
                'name' => $Request->name,
            ]);

            Alert::success('Selamat', 'Anda telah berhasil menambahkan data');
            return redirect()->route('study-program.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('study-program.index');
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
            StudyProgram::where('id', $id)->delete();

            Alert::success('Selamat', 'Anda telah berhasil menghapus data');
            return redirect()->route('study-program.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('study-program.index');
        }
    }
}
