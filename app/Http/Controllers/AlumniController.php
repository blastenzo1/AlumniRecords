<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index(){
        $alumni = Alumni::all();
        return view('Alumni.index', ['Alumni' => $alumni]);
    }
}
