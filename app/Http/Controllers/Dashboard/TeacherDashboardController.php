<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $teacher = Auth::guard('teacher')->user();
        $today = now()->toDateString();
        $assignments = Assignment::where('teacher_id', $teacherId)->get();
        $submissions = Submission::with(['student', 'assignment'])
            ->whereHas('assignment', function ($query) use ($teacherId) {
                $query->where('teacher_id', $teacherId);
            })
            ->orderBy('created_at', 'desc')
            ->get();
        $students = Student::query()->where('teacher_id', Auth::guard('teacher')->user()->id)->get();
        $students_attendance = $students->map(function ($student) use ($teacher, $today) {
            $student->has_attendance_today = Attendance::where('teacher_id', $teacher->id)
                ->where('student_id', $student->id)
                ->whereDate('created_at', $today)
                ->exists();
            return $student;
        });
        return view('dashboard.teachers.teacher',
            compact('students', 'students_attendance', 'assignments','submissions'));
    }

    public function store_attendance(Request $request)
    {
        $request->validate([
            'attendance' => 'required|array'
        ]);

        $teacher_id = Auth::guard('teacher')->user()->id;
        $today = now()->toDateString();

        foreach ($request->attendance as $student_id => $status) {
            $alreadyExists = Attendance::where('teacher_id', $teacher_id)
                ->where('student_id', $student_id)
                ->whereDate('created_at', $today)
                ->exists();

            if (!$alreadyExists) {
                Attendance::create([
                    'teacher_id' => $teacher_id,
                    'student_id' => $student_id,
                    'status' => $status
                ]);
            }
        }

        return redirect()->back()->with('success', 'تم تسجيل الحضور لهذا اليوم!');
    }

    public function store_assigment(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date'
        ]);

        Assignment::create([
            'teacher_id' => Auth::guard('teacher')->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return redirect()->back()->with('success', 'تم إنشاء الواجب بنجاح!');
    }
    public function update_submission_assigment(Request $request, $id)
    {
        $request->validate([
            'grade' => 'nullable|numeric|min:0|max:100',
            'feedback' => 'nullable|string|max:255',
        ]);

        $submission = Submission::findOrFail($id);
        $submission->update([
            'grade' => $request->grade,
            'feedback' => $request->feedback,
        ]);

        return back()->with('success', 'تم تحديث تقييم الطالب بنجاح ✅');
    }
}
