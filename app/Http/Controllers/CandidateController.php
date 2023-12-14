<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateRequest;
use App\Models\Candidate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class CandidateController extends Controller
{
    function __construct() {
        $this->middleware('can:Candidate - Read', ['only' => ['index','show']]);
        $this->middleware('can:Candidate - Create', ['only' => ['create','store']]);
        $this->middleware('can:Candidate - Update', ['only' => ['edit','update']]);
        $this->middleware('can:Candidate - Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        if (request()->ajax()) {
            $Data = Candidate::latest()->get();

            return DataTables::of($Data)->addIndexColumn()->addColumn('action', 'master.candidate.action')->rawColumns(['action'])->make(true);
        }

        $Title = "Kandidat";

        return view('master.candidate.index', compact('Title'));
    }

    public function create()
    {
        $Title = "Tambah Kandidat";

        return view('master.candidate.create', compact('Title'));
    }

    public function store(StoreCandidateRequest $Request)
    {
        try {
            $Photo = $Request->file('photo');
            $VisionAndMission = $Request->file('vision_and_mission');
            $CurriculumVitae = $Request->file('curriculum_vitae');

            if ($Request->hasFile('photo')) {
                $TempPhoto = $Photo->store('public/candidate/photo');

                if ($Request->hasFile('vision_and_mission')) {
                    $TempVisionAndMission = $VisionAndMission->store('public/candidate/vision_and_mission');
    
                    if ($Request->hasFile('curriculum_vitae')) {
                        $TempCurriculumVitae = $CurriculumVitae->store('public/candidate/curriculum_vitae');
        
                        Candidate::create([
                            'sequence_number' => $Request->sequence_number,
                            'fullname' => $Request->fullname,
                            'photo' => $TempPhoto,
                            'vision_and_mission' => $TempVisionAndMission,
                            'curriculum_vitae' => $TempCurriculumVitae
                        ]);
                    }
                }
            }

            Alert::success('Selamat', 'Anda telah berhasil menambahkan data');
            return redirect()->route('candidate.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('candidate.index');
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
            Candidate::where('id', $id)->delete();

            Alert::success('Selamat', 'Anda telah berhasil menghapus data');
            return redirect()->route('candidate.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('candidate.index');
        }
    }
}
