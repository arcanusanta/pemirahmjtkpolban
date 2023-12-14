<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Result;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PollingBoothController extends Controller
{
    public function index()
    {
        $Candidates = Candidate::first()->get();
        $UserID = Auth::user()->id;

        $Users = Voter::where("id", $UserID)->first();
        $Active = $Users->status;
        $IsVote = Result::where("voter_id", $Users->id)->count();

        if ($Users->status != 'NON-AKTIF') {
            if($IsVote == 0) {
                return view('master.polling-booth.index', compact('Candidates', 'IsVote', 'Users'));
            } else {
                return view('master.polling-booth.index', compact('IsVote'));
            }
        } else {
            return view('master.polling-booth.index',compact('IsVote') );
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $Request)
    {
        try {
            $Voter = Voter::where('id', Auth::user()->id)->first();

            $Result = new Result();
            $Result->voter_id = Auth::user()->id;
            $Result->candidate_id = $Request->candidate;
            $Result->save();

            $Voter->election_status = "Sudah Memilih";
            $Voter->save();

            Alert::success('Selamat', 'Terima kasih Anda telah menggunakan hak suara');
            return redirect()->route('polling-booth.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('polling-booth.index');
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
        //
    }
}
