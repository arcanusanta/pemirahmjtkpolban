<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
                        ->addColumn('action', function($item) {
                            return '
                                <div class="d-flex">
                                    <a href="' . route('operator.edit', $item->id) . '" class="ml-2 btn btn-warning">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                    <form class="inline-block" action="' . route('operator.destroy', $item->id) . '" method="POST">
                                        <button class="ml-2 btn btn-danger">
                                            <span class="fas fa-trash"></span>
                                        </button>
                                        ' . method_field('delete') . csrf_field() . '
                                    </form>
                                </div>
                            ';
                        })->rawColumns(['action'])->make(true);
        }

        return view('master.operator.index');
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
