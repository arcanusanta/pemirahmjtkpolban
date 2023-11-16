<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $Title = "Dashboard";

        return view('master.index', compact('Title'));
    }
}
