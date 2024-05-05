<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $alumniData = Course::with('college')
            ->withCount(['educationAttainments as alumni_count'])
            ->get()
            ->map(function ($course) {
                return [
                    'college' => $course->college->name,
                    'course' => $course->name,
                    'alumni_count' => $course->alumni_cozunt
                ];
            });

        $chapter_count = Chapter::count();
        $course_count = Course::count();
        $activity_log_count = ActivityLog::count();

        return view('staff.dashboard.index', compact('alumniData', 'chapter_count', 'course_count', 'activity_log_count'));
    }
}
