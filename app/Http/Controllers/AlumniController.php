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
        $alumnis = Alumni::paginate(7);
        return view('staff.records.index', compact('alumnis'));
    }

    public function view($id) {
        $alumni = Alumni::where('id', '=', $id)->first();
        $address = Address::where('info_id', '=', $id)->first();
        $educationAttainment = EducationAttainment::where('info_id', '=', $id)->first();
        return view('staff.records.view', compact('alumni', 'address', 'educationAttainment'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $alumnis = Alumni::where('name', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%')
            ->paginate(7);

        return view('staff.records.index', compact('alumnis'));
    }

    // public function view(Alumni $alumni)
    // {
    //     $alumni->load('address', 'educationAttainment');

    //     return view('staff.records.view', compact('alumni'));
    // }
}




