<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Parnet;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::count();

        $teachersCount = Teacher::count();
        $parentsCount = Parnet::count();

        return view('dashboard.admin', compact('studentsCount', 'teachersCount', 'parentsCount'));
    }

    public function students()
    {
        $students = Student::query()->get();

        return view('students.students-list',compact('students'));
    }
    public function teachers() {
        $teachers = Teacher::query()->get();
        return view('teachers.teachers-list',compact('teachers'));
    }
    public function parents() {
        $parents = Parnet::query()->with('students')->withCount('students')->get();
        return view('parents.parents-list',compact('parents'));
    }


    public function create_student() {
        $teachers = Teacher::all(['id', 'name']);
        $parents = Parnet::all(['id', 'name']);

        $nextNumber = 'P-' . str_pad(\App\Models\Student::count() + 1, 4, '0', STR_PAD_LEFT);

        return view('students.students-add', compact('teachers', 'parents', 'nextNumber'));

    }
    public function create_teacher() {
        $nextNumber = 'TEA-' . str_pad(\App\Models\Teacher::count() + 1, 4, '0', STR_PAD_LEFT);

        return view('teachers.teachers-add',compact('nextNumber'));
    }
    public function create_parent() {
        $nextNumber = 'PAR-' . str_pad(\App\Models\Parnet::count() + 1, 4, '0', STR_PAD_LEFT);
        return view('parents.parents-add', compact('nextNumber'));
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'user_number' => 'required|unique:students,user_number',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|string|min:8',
            'age' => 'required|numeric|min:5',
            'gender' => 'required|in:male,female',
            'grade' => 'required|string|max:50',
            'teacher_id' => 'required|exists:teachers,id',
            'parent_id' => 'required|exists:parnets,id',
        ]);

        Student::create([
            'user_number' => $request->user_number,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'age' => $request->age,
            'gender' => $request->gender,
            'grade' => $request->grade,
            'teacher_id' => $request->teacher_id,
            'parent_id' => $request->parent_id,
        ]);

        return redirect(route('admin.students.index'))->with('success', 'تمت إضافة الطالب بنجاح!');
    }

    public function storeTeacher(Request $request)
    {
        $request->validate([
            'user_number' => 'required|string|unique:teachers,user_number',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|string',
            'specialization' => 'required|string',
            'hire_date' => 'required|date',
        ]);

        Teacher::create([
            'user_number' => $request->user_number,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'phone' => $request->phone,
            'specialization' => $request->specialization,
            'hire_date' => $request->hire_date,
        ]);


        return redirect(route('admin.teachers.index'))->with('success', 'تمت إضافة المعلم بنجاح!');
    }
    public function storeParent(Request $request)
    {

        $request->validate([
            'user_number' => 'required|string|unique:parnets,user_number',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:parnets,email',
            'phone' => 'required|string|max:20',
            'relation' => 'required|string|max:50',
        ]);
        \App\Models\Parnet::create([
            'user_number' => $request->user_number,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'phone' => $request->phone,
            'relation' => $request->relation,
        ]);

        return redirect(route('admin.parents.index'))->with('success', 'تمت إضافة ولي الامر بنجاح!');
    }

}
