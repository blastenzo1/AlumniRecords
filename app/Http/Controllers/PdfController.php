<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\EducationAttainment;
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

    public function generateAlumnisByCourse($course_name)
    {
        $education_attainments = EducationAttainment::where('course', $course_name)->get();

        $alumni_ids = $education_attainments->pluck('info_id');

        $alumnis = Alumni::whereIn('id', $alumni_ids)->get();

        $data = [
            'title' => 'Alumni Details by Course: ' . $course_name,
            'date' => now(),
            'course_name' => $course_name,
            'alumnis' => $alumnis,
        ];

        $pdf = Pdf::loadView('staff.courselist.generate-alumnis-by-course', $data);
        return $pdf->download('generated-alumnis-by-course-' . strtolower($course_name) . '.pdf');
    }
}
