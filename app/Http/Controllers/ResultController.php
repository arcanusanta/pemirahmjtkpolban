<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $Candidate = Candidate::get();
        $Result = Result::with("voter", "candidate")->GroupBy('results.candidate_id')->get();

        foreach ($Result as $Value) {
            $Candidates = Candidate::where("id", $Value->candidate_id)->get();
            foreach ($Candidates as $key) {
                $Data['Label'][] = $key->fullname;
                
            }
            $DataCount = Result::where("candidate_id", $Value->candidate->id)->count();

            $Data['data'][] =  (int) $DataCount;

            if($Data != null) {
                $this->Result = json_encode($Data);
                $Result = $this->Result;
            }
        }

        return view('master.result.index', compact('Result'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }
}
