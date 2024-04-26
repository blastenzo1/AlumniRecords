<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Alumni;
use App\Models\EducationAttainment;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::all();
        return view('staff.records.index', compact('alumnis'));
    }

    public function add()
    {
        return view('Staff.Records.add');
    }

    public function view($id) {
        $alumni = Alumni::where('id', '=', $id)->first();
        $address = Address::where('info_id', '=', $id)->first();
        $educationAttainment = EducationAttainment::where('info_id', '=', $id)->first();
        return view('staff.records.view', compact('alumni', 'address', 'educationAttainment'));
    }

    // public function view(Alumni $alumni)
    // {
    //     $alumni->load('address', 'educationAttainment');

    //     return view('staff.records.view', compact('alumni'));
    // }
}




