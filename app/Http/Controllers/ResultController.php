<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Candidate = Candidate::get();
        $Result = Result::with("voter", "candidate")->GroupBy('candidate_id')->get();

        foreach ($Result as $Value) {
            $Candidates = Candidate::with("voter")->where("id", $Value->candidate_id)->get();
            foreach ($Candidates as $key) {
                $Data['Label'][] = $key->name;
                
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
