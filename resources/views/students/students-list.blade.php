<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>رُقي | عرض الطلاب</title>
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/customCss/style.css') }}">
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <div class="brand">🎓 رُقي</div>
        <ul class="menu">
            <li><a href="#" class="active">🏠 لوحة التحكم</a></li>

            <!-- المعلمين -->
            <li>
                <button class="toggle" data-target="#teachers-sub">
                    <span>👩‍🏫 المعلمون</span>
                    <span class="arrow">▾</span>
                </button>
                <ul id="teachers-sub" class="submenu">
                    <li><a href="#teachers-list">• عرض المعلمين</a></li>
                    <li><a href="#teachers-add">• إضافة معلم</a></li>
                </ul>
            </li>

            <!-- الطلاب -->
            <li>
                <button class="toggle" data-target="#students-sub">
                    <span>🎓 الطلاب</span>
                    <span class="arrow">▾</span>
                </button>
                <ul id="students-sub" class="submenu">
                    <li><a href="{{route('admin.students.index')}}">• عرض الطلاب</a></li>
                    <li><a href="{{route('admin.students.create')}}">• إضافة طالب</a></li>
                </ul>
            </li>

            <!-- أولياء الأمور -->
            <li>
                <button class="toggle" data-target="#parents-sub">
                    <span>👨‍👩‍👧 أولياء الأمور</span>
                    <span class="arrow">▾</span>
                </button>
                <ul id="parents-sub" class="submenu">
                    <li><a href="{{route('admin.parents.index')}}">• عرض أولياء الأمور</a></li>
                    <li><a href="{{route('admin.parents.create')}}">• إضافة وليّ أمر</a></li>
                </ul>
            </li>

            <div class="divider"></div>

            <!-- عناصر أخرى تبقى كما هي -->
            <li><a href="#classes">🏫 الصفوف</a></li>
            <li><a href="#reports">📈 التقارير</a></li>
            <li><a href="#settings">⚙️ الإعدادات</a></li>
        </ul>
    </aside>


    <main class="main">
    <div class="header">
      <h1>عرض الطلاب</h1>
      <div class="actions">
        <a class="btn" href="{{route('admin.students.create')}}">+ طالب جديد</a>
      </div>
    </div>

    <div class="card">
        @if (session('success'))
            <div style="background:#d1fae5;color:#065f46;padding:10px 14px;border-radius:10px;margin-bottom:15px;">
                {{ session('success') }}
            </div>
        @endif
      <table class="table">
        <thead>
          <tr><th>#</th><th>الاسم</th><th>الصف</th><th>البريد الالكتروني</th><th>إجراءات</th></tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$student->user_number}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->grade}}</td>
                <td>{{$student->email}}</td>
                <td><a class="link" href="#">تفاصيل</a> • <a class="link" href="#">تعديل</a> • <a class="link" href="#">حذف</a></td>

            </tr>
        @endforeach
{{--          <tr>--}}
{{--            <td>1</td><td>ليان ح.</td><td>التاسع A</td><td>0599-123456</td><td>نشط</td>--}}
{{--          </tr>--}}
{{--          <tr>--}}
{{--            <td>2</td><td>عمر م.</td><td>العاشر B</td><td>0599-987654</td><td>نشط</td>--}}
{{--            <td><a class="link" href="#">تفاصيل</a> • <a class="link" href="#">تعديل</a> • <a class="link" href="#">حذف</a></td>--}}
{{--          </tr>--}}
        </tbody>
      </table>
    </div>
  </main>
</div>
</body>
</html>
