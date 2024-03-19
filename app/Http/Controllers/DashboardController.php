<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $alumni = DB::table('alumnis')->get();
        return view('staff.index',compact('alumni'));
    }
}
