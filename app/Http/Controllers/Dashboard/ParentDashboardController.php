<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentDashboardController extends Controller
{
    public function index()
    {
        $parentId = Auth::guard('parent')->user()->id;

        $childrenIds = Student::where('parent_id', $parentId)->pluck('id');

        $assignments = Assignment::with([
            'teacher',
            'submissions' => function ($q) use ($childrenIds) {
                $q->whereIn('student_id', $childrenIds)->with('student');
            }
        ])->orderBy('created_at', 'desc')->get();

        $children = Student::where('parent_id', $parentId)
            ->with('teacher')
            ->orderBy('name')
            ->get();

        $parent = Auth::guard('parent')->user();
        $children = Student::where('parent_id', $parent->id)->get();

        $childrenCount = $children->count();
        $averageAttendance = round($children->avg('attendance_rate'), 1);
        $averageGrades = round($children->avg('average_grade'), 1);
        $submittedAssignments = $children->sum('submitted_assignments');

        return view('dashboard.parents.parent', compact(
            'children',
            'childrenCount',
            'averageAttendance',
            'averageGrades',
            'submittedAssignments',
            'assignments',
            'children'
        ));
    }
}
