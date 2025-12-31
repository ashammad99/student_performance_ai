<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class aiEvaluation extends Controller
{
    public function aiReport($studentId)
    {
        $student = Student::with(['teacher'])->findOrFail($studentId);

        // 🧮 حساب نسبة الحضور
        $total = Attendance::where('student_id', $studentId)->count();
        $present = Attendance::where('student_id', $studentId)->where('status', 'present')->count();
        $attendance = $total > 0 ? round(($present / $total) * 100, 2) : 0;

        // 🧮 حساب الواجبات المسلّمة وغير المسلّمة
        $pendingAssignmentsCount = Assignment::query()
            ->whereDate('due_date', '<=', now())
            ->whereDoesntHave('submissions', function ($query) use ($studentId) {
                $query->where('student_id', $studentId);
            })
            ->count();

        $submittedCount = Assignment::whereHas('submissions', function($query) use ($studentId) {
            $query->where('student_id', $studentId);
        })->count();

        $gradedSubmissions = Submission::where('student_id', $studentId)
            ->whereNotNull('grade')
            ->get(['grade', 'feedback']);

        // ⚙️ حساب معدل الدرجات
        $averageGrade = $gradedSubmissions->count() > 0
            ? round($gradedSubmissions->avg('grade'), 2)
            : 0;

        $teacherComments = $gradedSubmissions->pluck('feedback')->filter()->unique()->values();

        // 🚀 إرسال البيانات إلى مودل Python AI
        $response = Http::post('http://127.0.0.1:8000/evaluate', [
            'attendance_percentage' => $attendance,
            'assignments_score' => $averageGrade,
            'pending_assignments' => $pendingAssignmentsCount,
        ]);

        // 🧠 استقبال نتيجة الذكاء الاصطناعي
        $aiResult = $response->json();
        $aiScore = $aiResult['score'] ?? 0;
        $aiComment = $aiResult['recommendations'] ?? ['لم يتم استلام توصيات.'];

        return view('ai.ai_report', compact(
            'student',
            'attendance',
            'pendingAssignmentsCount',
            'submittedCount',
            'averageGrade',
            'aiScore',
            'aiComment',
            'teacherComments'
        ));
    }
}
