<?php

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\ParentLoginController;
use App\Http\Controllers\Auth\ParentRegisterController;
use App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\Auth\StudentRegisterController;
use App\Http\Controllers\Auth\TeacherLoginController;
use App\Http\Controllers\Auth\TeacherRegisterController;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\ParentDashboardController;
use App\Http\Controllers\Dashboard\StudentDashboardController;
use App\Http\Controllers\Dashboard\TeacherDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
});

Route::get('/student/register', [StudentRegisterController::class, 'showRegisterForm'])->name('student.register');
Route::post('/student/register', [StudentRegisterController::class, 'register'])->name('student.register.submit');

Route::get('/parent/register', [ParentRegisterController::class, 'showRegisterForm'])->name('parent.register');
Route::post('/parent/register', [ParentRegisterController::class, 'register'])->name('parent.register.submit');

Route::get('/teacher/register', [TeacherRegisterController::class, 'showRegisterForm'])->name('teacher.register');
Route::post('/teacher/register', [TeacherRegisterController::class, 'register'])->name('teacher.register.submit');

Route::get('/student/login', [StudentLoginController::class, 'showLoginForm'])->name('student.login');
Route::post('/student/login', [StudentLoginController::class, 'login'])->name('student.login.submit');
Route::post('/student/logout', [StudentLoginController::class, 'logout'])->name('student.logout');

Route::get('/teacher/login', [TeacherLoginController::class, 'showLoginForm'])->name('teacher.login');
Route::post('/teacher/login', [TeacherLoginController::class, 'login'])->name('teacher.login.submit');
Route::post('/teacher/logout', [TeacherLoginController::class, 'logout'])->name('teacher.logout');


Route::get('/parent/login', [ParentLoginController::class, 'showLoginForm'])->name('parent.login');
Route::post('/parent/login', [ParentLoginController::class, 'login'])->name('parent.login.submit');
Route::post('/parent/logout', [ParentLoginController::class, 'logout'])->name('parent.logout');

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth.admin')
    ->name('admin.dashboard');

Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->middleware('auth.student')
    ->name('dashboard.student');

Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])->middleware('auth.teacher')
    ->name('dashboard.teacher');

Route::get('/parent/dashboard', [ParentDashboardController::class, 'index'])->middleware('auth.parent')
    ->name('dashboard.parent');

Route::get('/admin/dashboard/students', [AdminDashboardController::class, 'students'])->middleware('auth.admin')
    ->name('admin.students.index');
Route::get('/admin/dashboard/students/create', [AdminDashboardController::class, 'create_student'])->middleware('auth.admin')
    ->name('admin.students.create');

Route::get('/admin/dashboard/teachers', [AdminDashboardController::class, 'teachers'])->middleware('auth.admin')
    ->name('admin.teachers.index');
Route::get('/admin/dashboard/teachers/create', [AdminDashboardController::class, 'create_teacher'])->middleware('auth.admin')
    ->name('admin.teachers.create');

Route::get('/admin/dashboard/parents', [AdminDashboardController::class, 'parents'])->middleware('auth.admin')
    ->name('admin.parents.index');
Route::get('/admin/dashboard/parents/create', [AdminDashboardController::class, 'create_parent'])->middleware('auth.admin')
    ->name('admin.parents.create');

Route::post('/admin/students/store', [AdminDashboardController::class, 'storeStudent'])->name('admin.students.store')->middleware('auth.admin');
Route::post('/admin/teachers/store', [AdminDashboardController::class, 'storeTeacher'])->name('admin.teachers.store')->middleware('auth.admin');
Route::post('/admin/parents/store', [AdminDashboardController::class, 'storeParent'])->name('admin.parents.store')->middleware('auth.admin');

Route::middleware(['auth:teacher'])->group(function() {
    Route::post('/attendance/store', [TeacherDashboardController::class, 'store_attendance'])->name('attendance.store');
});


Route::prefix('teacher')->middleware('auth:teacher')->group(function() {
    Route::post('/assignments', [TeacherDashboardController::class, 'store_assigment'])->name('teacher.assignments.store');
});


Route::middleware('auth:teacher')->group(function () {
    Route::put('/teacher/submissions/{id}', [TeacherDashboardController::class, 'update_submission_assigment'])->name('teacher.submissions.update');
});


Route::get('/student/assignments/table', [StudentDashboardController::class, 'getAssignmentsTable'])
    ->middleware('auth:student')
    ->name('student.assignments.table');

Route::middleware('auth:student')->group(function () {
    Route::get('/student/submit-assignment/{assignment}', [StudentDashboardController::class, 'apply_assignment'])->name('student.assignments');
    Route::post('/student/submit-assignment/{assignment}', [StudentDashboardController::class, 'submit'])->name('student.assignments.submit');
});

Route::prefix('parent')->middleware('auth:parent')->group(function () {
    Route::get('ai-report/{studentId}', [\App\Http\Controllers\AI\aiEvaluation::class, 'aiReport'])->name('parent.ai.report');
});


