<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Auth::user();
        $studentId = Auth::guard('student')->user()->id;

        $assignments = Assignment::with(['teacher', 'submissions' => function ($q) use ($studentId) {
            $q->where('student_id', $studentId);
        }])->orderBy('created_at', 'desc')->get();
        $total = Attendance::where('student_id', $studentId)->count();
        $present = Attendance::where('student_id', $studentId)->where('status', 'present')->count();


        $percentage = $total > 0 ? round(($present / $total) * 100, 2) : 0;


        $records = Attendance::where('student_id', $studentId)
            ->orderBy('created_at', 'desc')
            ->get();
        $pendingAssignmentsCount = Assignment::query()->whereDate('due_date', '<=', now())
            ->whereDoesntHave('submissions', function ($query) use ($studentId) {
                $query->where('student_id', $studentId);
            })
            ->count();
        return view('dashboard.students.student',
            compact('assignments', 'records', 'percentage', 'pendingAssignments', 'pendingAssignmentsCount'));
    }


    public function apply_assignment(Assignment $assignment)
    {
        return view('dashboard.students.apply-assignment',compact('assignment'));
    }

    public function submit(Request $request, Assignment $assignment)
    {
        $studentId = Auth::guard('student')->user()->id;

        $request->validate([
            'answer' => 'required|string|max:255',
        ]);

        $exists = Submission::where('assignment_id', $assignment->id)
            ->where('student_id', $studentId)
            ->first();

        if ($exists) {
            return redirect(route('dashboard.student'))->with('error', 'لقد قمت بتسليم هذا الواجب مسبقًا ❗');
        }


        Submission::create([
            'assignment_id' => $assignment->id,
            'student_id' => $studentId,
            'answer' => $request->answer,
        ]);

        return redirect(route('dashboard.student'))->with('success', 'تم رفع الواجب بنجاح ✅');
    }
}
