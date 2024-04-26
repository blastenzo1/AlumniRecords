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

    public function destroy($id)
    {
        try {
            $alumni = Alumni::findOrFail($id);
            EducationAttainment::where('info_id', $id)->delete();
            Address::where('info_id', $id)->delete();
            $alumni->delete();

            return redirect()->back()->with('success', 'Alumni record and associated data successfully deleted!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the alumni record: ' . $e->getMessage());
        }
    }

    // public function view(Alumni $alumni)
    // {
    //     $alumni->load('address', 'educationAttainment');

    //     return view('staff.records.view', compact('alumni'));
    // }
}




