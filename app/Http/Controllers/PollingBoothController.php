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
        $Candidates = Candidate::latest()->get();
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
        Alert::success('Selamat', 'Anda telah berhasil memilih');
        return redirect()->route('dashboard');
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
