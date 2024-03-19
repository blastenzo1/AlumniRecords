<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumniController extends Controller
{
    public function index(){
        $alumnis = Alumni::all();
        return view('staff.records', compact('alumnis'));
    }
}
