<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Course;
use App\Models\EducationAttainment;
use Illuminate\Http\Request;

class CourseListController extends Controller
{
    public function index()
    {
        $courses = Course::with('college')->get();

        $groupedCourses = $courses->groupBy('college_id');

        return view('Staff.CourseList.index', compact('groupedCourses'));
    }

    public function show_course($courseName)
    {
        $educationAttainment = EducationAttainment::where('course', $courseName)->first();

        if ($educationAttainment) {
            $alumnis = $educationAttainment->alumni()->get();
            $course_name = $courseName;
            return view('Staff.CourseList.courses', compact('alumnis', 'course_name'));
        } else {
            $course_name = $courseName;
            return view('Staff.CourseList.no_results', ['course_name' => $course_name]);
        }
    }
}
