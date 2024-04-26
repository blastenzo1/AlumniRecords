<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $alumni = DB::table('alumnis')->get();
        $chapter_count = Chapter::count();
        $course_count = Course::count();
        return view('staff.dashboard.index',compact('alumni', 'chapter_count', 'course_count'));
    }
}
