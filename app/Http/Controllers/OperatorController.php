<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOperatorRequest;
use App\Http\Requests\UpdateOperatorRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class OperatorController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $Data = User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
                        ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                        ->select('users.*', 'roles.name AS rolename')
                        ->where('roles.name', 'Operator')->get();

            return DataTables::of($Data)->addIndexColumn()
                        ->addColumn('action', 'master.operator.action')->rawColumns(['action'])->make(true);
        }

        $Title = "Tambah Operator";

        return view('master.operator.index', compact('Title'));
    }

    public function create()
    {
        $Title = "Tambah Operator";

        return view('master.operator.create', compact('Title'));
    }

    public function store(StoreOperatorRequest $Request)
    {
        try {
            User::create([
                'name' => $Request->name,
                'email' => $Request->email,
                'password' => Hash::make($Request->password),
            ])->assignRole('Operator');

            Alert::success('Congrats', 'You\'ve Successfully Registered');
            return redirect()->route('operator.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('operator.index');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $Title = "Edit Operator";
        $Data = User::where('id', $id)->get();

        return view('master.operator.edit', compact('Data', 'Title'));
    }

    public function update(UpdateOperatorRequest $Request, string $id)
    {
        try {
            $Data = User::where('id', $id);

            $Data->update([
                'name' => $Request->name,
                'email' => $Request->email,
            ]);

            Alert::success('Congrats', 'You\'ve Successfully Updated');
            return redirect()->route('operator.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('operator.index');
        }
    }

    public function destroy(string $id)
    {
        try {
            User::where('id', $id)->delete();

            Alert::success('Selamat', 'Anda telah berhasil menghapus data');
            return redirect()->route('operator.index');
        } catch (\Exception $Excep) {
            Alert::error('Error', $Excep->getMessage());
            return redirect()->route('operator.index');
        }
    }
}
