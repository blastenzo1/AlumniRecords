<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function index()
    {
        $user = User::get();
        $data = [
            'title' => 'Alumni Details',
            'date' => now(),
            'users' => $user,
        ];
        return view('staff.records.generate-alumni-details', $data);
    }
    public function generateAlumniDetails($id)
    {
        $alumni = Alumni::findOrFail($id);

        $data = [
            'title' => 'Alumni Details',
            'date' => now(),
            'alumni' => $alumni,
        ];

        $pdf = Pdf::loadView('staff.records.generate-alumni-details', $data);
        return $pdf->download('generated-alumni-details.pdf');
    }

    public function generateAllAlumniDetails()
    {
        $alumnis = Alumni::all();

        $data = [
            'title' => 'All Alumni Details',
            'date' => now(),
            'alumnis' => $alumnis,
        ];

        $pdf = Pdf::loadView('staff.records.generate-all-alumni', $data);
        return $pdf->download('generated-all-alumnis.pdf');
    }
}
