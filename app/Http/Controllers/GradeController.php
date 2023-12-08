<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class GradeController extends Controller
{
    function __construct() {
        $this->middleware('can:Grade - Read', ['only' => ['index','show']]);
        $this->middleware('can:Grade - Create', ['only' => ['create','store']]);
        $this->middleware('can:Grade - Update', ['only' => ['edit','update']]);
        $this->middleware('can:Grade - Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (request()->ajax()) {
            $Data = Grade::latest()->get();

            return DataTables::of($Data)->addIndexColumn()->addColumn('action', 'master.grade.action')->rawColumns(['action'])->make(true);
        }

        $Title = "Kelas";

        return view('master.grade.index', compact('Title'));
    }

    public function create()
    {
        $Title = "Tambah Kelas";

        return view('master.grade.create', compact('Title'));
    }

    public function store(GradeRequest $Request)
    {
        try {
            Grade::create([
                'name' => $Request->name,
            ]);

            Alert::success('Selamat', 'Anda telah berhasil menambahkan data');
            return redirect()->route('grade.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('grade.index');
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
            Grade::where('id', $id)->delete();

            Alert::success('Selamat', 'Anda telah berhasil menghapus data');
            return redirect()->route('grade.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('grade.index');
        }
    }
}
