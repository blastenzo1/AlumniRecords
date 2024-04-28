<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activity_log = ActivityLog::all();
        return view('Staff.ActivityLog.index', compact('activity_log'));
    }
}
