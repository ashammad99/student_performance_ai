<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رُقي | لوحة المعلّم</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --blue-900: #0B3D91;
            --blue-500: #3B82F6;
            --gray-50: #F9FAFB;
            --border: #E5E7EB;
            --text: #1f2937;
            --text-sub: #334155;
            --radius: 18px;
            --shadow: 0 10px 26px rgba(11, 61, 145, .10)
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: 'Tajawal', sans-serif;
            background: var(--gray-50);
            color: var(--text)
        }

        .app {
            display: grid;
            grid-template-columns:280px 1fr;
            min-height: 100vh
        }

        .sidebar {
            background: linear-gradient(180deg, #0B3D91, #0a3b89);
            color: #fff;
            padding: 22px
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px
        }

        .brand-title {
            font-weight: 800;
            font-size: 22px
        }

        .brand-badge {
            position: relative;
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: #ffffff1a;
            display: grid;
            place-items: center
        }

        .brand-dot {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background: #fff
        }

        .brand-cap {
            position: absolute;
            top: -8px;
            inset-inline-end: -8px;
            width: 22px;
            height: 22px
        }

        .menu {
            list-style: none;
            margin: 8px 0 0;
            padding: 0
        }

        .menu li {
            margin-bottom: 6px
        }

        .menu a, .toggle {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #e9f1ff;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 12px;
            transition: .2s;
            background: transparent;
            border: none;
            cursor: pointer;
            font: inherit
        }

        .menu a:hover, .toggle:hover, .menu a.active {
            background: #ffffff1a
        }

        .arrow {
            margin-inline-start: auto;
            transition: transform .2s
        }

        .submenu {
            display: none;
            list-style: none;
            margin: 4px 0 10px;
            padding: 8px;
            border-radius: 12px;
            background: #ffffff14
        }

        .submenu.show {
            display: block
        }

        .submenu a {
            display: block;
            color: #e9f1ff;
            text-decoration: none;
            padding: 9px 10px;
            border-radius: 10px;
            font-size: 14px
        }

        .submenu a:hover {
            background: #ffffff22
        }

        .divider {
            height: 1px;
            background: #ffffff2b;
            margin: 12px 0
        }

        .sb-badge {
            margin-inline-start: auto;
            background: #fff;
            color: #0B3D91;
            border-radius: 999px;
            padding: 2px 8px;
            font-weight: 800;
            font-size: 12px
        }

        .main {
            padding: 26px 34px
        }

        .hero {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--blue-900);
            padding-bottom: 10px;
            margin-bottom: 16px;
            border-bottom: 1px solid var(--border)
        }

        .hero .title {
            margin: 0;
            font-size: 26px;
            font-weight: 800
        }

        .stats {
            display: grid;
            grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));
            gap: 14px
        }

        .card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 16px
        }

        .k {
            margin: 0 0 4px;
            color: var(--text-sub);
            font-size: 14px
        }

        .v {
            font-weight: 800;
            color: var(--blue-900);
            font-size: 26px
        }

        .btn {
            background: var(--blue-500);
            border: none;
            color: #fff;
            padding: 9px 12px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 700
        }

        .btn.secondary {
            background: #64748b
        }

        .btn.danger {
            background: #ef4444
        }

        .btn.ghost {
            background: #eef2ff;
            color: #1d4ed8
        }

        input, select, textarea {
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px;
            color: var(--text);
            background: #fff
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px
        }

        thead th {
            font-size: 14px;
            color: var(--text-sub);
            text-align: right;
            padding: 8px 10px
        }

        tbody tr {
            background: #fff;
            border: 1px solid var(--border)
        }

        tbody td {
            padding: 10px;
            color: var(--text)
        }

        .badge {
            display: inline-block;
            background: #eef2ff;
            color: #1d4ed8;
            padding: 4px 8px;
            border-radius: 999px;
            font-size: 12px
        }

        .section {
            display: none;
            animation: fade .15s ease
        }

        .section.active {
            display: block
        }

        @keyframes fade {
            from {
                opacity: 0;
                transform: translateY(6px)
            }
            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .35);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 16px;
            z-index: 50
        }

        .modal.show {
            display: flex
        }

        .modal-card {
            background: #fff;
            border-radius: 16px;
            max-width: 680px;
            width: 100%;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            padding: 16px
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px
        }

        @media (max-width: 980px) {
            .app {
                grid-template-columns:92px 1fr
            }

            .brand-title {
                display: none
            }
        }
    </style>
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-badge">
                <div class="brand-dot"></div>
                <svg class="brand-cap" viewBox="0 0 64 64" fill="#fff" aria-hidden="true">
                    <path d="M4 24l28-12 28 12-28 12L4 24zm8 10v8c0 2 10 8 20 8s20-6 20-8v-8l-20 8-20-8z"/>
                </svg>
            </div>
            <div class="brand-title">رُقي</div>
        </div>
        <ul class="menu" id="menu">
            <li><a href="#overview" class="active">🏠 الصفحة الرئيسية</a></li>
            <li>
                <button class="toggle" data-target="#teacher-sub">👩‍🏫 المعلّم <span class="arrow">▾</span></button>
                <ul id="teacher-sub" class="submenu show">
                    <li><a href="#lectures">🎓 إدارة المحاضرات</a></li>
                    <li><a href="#students">🎓 إدارة الطلاب</a></li>
                    <li><a href="#exams">📚 إدارة الامتحانات</a></li>
                    <li><a href="#add-assignment">📝 اضافة واجب</a></li>
                    <li><a href="#show-assignments">📝 عرض الواجبات</a></li>
                    <li><a href="#grade-assignments">📝 تقييم الواجبات</a></li>
                    <li><a href="#attendance">🗓️ الحضور والغياب</a></li>
                    <li><a href="#messages">💬 رسائل للطلبة</a></li>
                    <li style="list-style: none; margin: 0; padding: 0;">
                        <form action="{{ route('teacher.logout') }}" method="post" style="display: inline;">
                            @csrf
                            <button type="submit" style="
            background: none;
            border: none;
            color: #e3dada;
            cursor: pointer;
            padding: 0;
            font: inherit;
        ">تسجيل الخروج
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="divider"></div>
    </aside>

    <main class="main">
        <div>
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div
                    style="background-color:#d4edda; color:#155724; border:1px solid #c3e6cb; padding:10px 15px; border-radius:5px; margin-bottom:10px;">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="hero"><h1 class="title" id="page-title">الصفحة الرئيسية </h1></div>
        <h1> مرحبا، {{Auth::guard('teacher')->user()->name}}</h1>
        <!-- Overview -->
        <section id="overview" class="section active">
            <div class="stats">
                <div class="card"><p class="k">محاضرات برابط فعّال</p>
                    <p class="v" id="k-lectures">0</p></div>
                <div class="card"><p class="k">امتحانات مجدولة</p>
                    <p class="v" id="k-exams">0</p></div>
                <div class="card"><p class="k">واجبات بانتظار التقييم</p>
                    <p class="v" id="k-to-grade">0</p></div>
            </div>
        </section>

        <!-- Lectures -->
        <section id="lectures" class="section">
            <div class="card">
                <h3 style="margin:0 0 10px">إدارة المحاضرات</h3>
                <div
                    style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:8px;margin-bottom:10px">
                    <input id="lc-day" placeholder="اليوم (الأحد)">
                    <input id="lc-time" placeholder="الوقت (09:00 - 09:45)">
                    <input id="lc-subj" placeholder="المادة (رياضيات)">
                    <input id="lc-teacher" placeholder="المعلّم (اختياري)">
                    <input id="lc-url" placeholder="رابط الانضمام (Zoom/Meet)">
                    <button id="lc-add" class="btn">➕ إضافة</button>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>اليوم</th>
                        <th>الوقت</th>
                        <th>المادة</th>
                        <th>المعلّم</th>
                        <th>الرابط</th>
                        <th>إجراء</th>
                    </tr>
                    </thead>
                    <tbody id="lectures-body"></tbody>
                </table>
            </div>
        </section>
        <!-- Students -->
        <section id="students" class="section">
            <div class="card">
                <h3 style="margin:0 0 10px">إدارة الطلاب</h3>

                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الصف</th>
                        <th>البريد الالكتروني</th>
                        <th>إجراءات</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->user_number}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->grade}}</td>
                            <td>{{$student->email}}</td>
                            <td><a class="link" href="#">تفاصيل</a> • <a class="link" href="#">تعديل</a> • <a
                                    class="link" href="#">حذف</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <!-- Exams (NEW) -->
        <section id="exams" class="section">
            <div class="card">
                <h3 style="margin:0 0 10px">إدارة الامتحانات</h3>
                <div
                    style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:8px;margin-bottom:10px">
                    <input id="ex-subj" placeholder="المادة">
                    <input id="ex-type" placeholder="النوع (قصير/شهري/نهائي)">
                    <input id="ex-date" type="date" placeholder="التاريخ">
                    <input id="ex-time" placeholder="الوقت (10:00)">
                    <input id="ex-duration" placeholder="المدة (دقيقة) مثال: 45">
                    <input id="ex-url" placeholder="رابط الامتحان (اختياري)">
                    <button id="ex-add" class="btn">➕ إضافة</button>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>المادة</th>
                        <th>النوع</th>
                        <th>التاريخ</th>
                        <th>الوقت</th>
                        <th>المدة</th>
                        <th>الرابط</th>
                        <th>إجراء</th>
                    </tr>
                    </thead>
                    <tbody id="exams-body"></tbody>
                </table>
            </div>

            <div class="card" style="margin-top:14px">
                <h3 style="margin:0 0 10px">درجات الطلاب في الامتحان المحدد</h3>
                <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:8px">
                    <select id="ex-select"></select>
                    <input id="ex-student" placeholder="اسم الطالب">
                    <input id="ex-score" placeholder="الدرجة (مثال: 18/20 أو 90)">
                    <input id="ex-note" placeholder="ملاحظة (اختياري)">
                    <button id="ex-grade-add" class="btn">💾 حفظ الدرجة</button>
                    <button id="ex-export" class="btn ghost">⬇️ تصدير CSV</button>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الطالب</th>
                        <th>الدرجة</th>
                        <th>ملاحظة</th>
                        <th>إزالة</th>
                    </tr>
                    </thead>
                    <tbody id="ex-grade-body"></tbody>
                </table>
            </div>
        </section>

        <!-- Grade Assignments -->
        <section id="add-assignment" class="section">
            <div class="card">
                <h3 style="margin:0 0 10px">إضافة واجب جديد</h3>
                <form action="{{ route('teacher.assignments.store') }}" method="POST">
                    @csrf
                    <label>عنوان الواجب:</label>
                    <input type="text" name="title" required><br>

                    <label>الوصف:</label>
                    <textarea name="description"></textarea><br>

                    <label>تاريخ التسليم:</label>
                    <input type="date" name="due_date"><br>

                    <button type="submit">حفظ</button>
                </form>
            </div>
        </section>
        <!-- Grade Assignments -->
        <section id="show-assignments" class="section">
            <div class="card">
                <h3 style="margin:0 0 10px"> عرض الواجبات</h3>
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> عنوان الواجب</th>
                        <th>وصف الواجب</th>
                        <th>تاريخ التسليم</th>
                    </tr>
                    </thead>
                    <tbody id="grade-body">
                    @foreach($assignments as $assigment)
                        <tr>
                            <td>{{$assigment->id}}</td>
                            <td>{{$assigment->title}}</td>
                            <td>{{$assigment->description}}</td>
                            <td>{{$assigment->due_date}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        <!-- Grade Assignments -->
        <section id="grade-assignments" class="section">
            <div class="card">
                <h3 style="margin:0 0 10px">تقييم الواجبات</h3>
                <table>
                    <thead>
                    <tr>
                        <th>اسم الطالب</th>
                        <th>عنوان الواجب</th>
                        <th>تاريخ التسليم</th>
                        <th>اجابة الطالب</th>
                        <th>الدرجة</th>
                        <th>ملاحظة</th>
                        <th>حفظ</th>
                    </tr>
                    </thead>
                    <tbody id="grade-body">
                    @foreach($submissions as $submission)
                        <tr>
                            <td>{{ $submission->student->name }}</td>
                            <td>{{ $submission->assignment->title }}</td>
                            <td>{{ $submission->created_at->format('Y-m-d') }}</td>

                            <td>
                                {{$submission->answer}}
                            </td>
                            <td>
                                <form action="{{ route('teacher.submissions.update', $submission->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="grade" value="{{ $submission->grade }}" min="0" max="100"
                                           style="width:60px;">

                                    <input type="text" name="feedback" value="{{ $submission->feedback }}"
                                           placeholder="اكتب ملاحظة..." style="width:150px;">

                                    <button type="submit"
                                            style="background:#4CAF50; color:white; border:none; padding:5px 10px; border-radius:4px;">
                                        💾 حفظ
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Attendance -->
        <section id="attendance" class="section">
            <div class="card">
                <form action="{{route('attendance.store')}}" method="POST">
                    @csrf

                    <table border="1" style="margin-top: 20px;">
                        <tr>
                            <th>اسم الطالب</th>
                            <th>حاضر</th>
                            <th>غائب</th>
                        </tr>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td><input type="radio" name="attendance[{{ $student->id }}]" value="present" required>
                                </td>
                                <td><input type="radio" name="attendance[{{ $student->id }}]" value="absent"></td>
                            </tr>
                        @endforeach
                    </table>

                    <button type="submit" style="margin-top: 10px;">حفظ</button>
                </form>
            </div>
        </section>
    </main>
</div>

<!-- Modals -->
<div id="lec-modal" class="modal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true">
        <div class="modal-header"><h3 style="margin:0">تعديل محاضرة</h3>
            <button id="lec-close" class="btn secondary" type="button">إغلاق</button>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:8px">
            <input id="em-day" placeholder="اليوم"><input id="em-time" placeholder="الوقت"><input id="em-subj"
                                                                                                  placeholder="المادة">
            <input id="em-teacher" placeholder="المعلّم"><input id="em-url" placeholder="الرابط">
        </div>
        <div style="display:flex;justify-content:flex-end;gap:8px;margin-top:10px">
            <button id="lec-save" class="btn" type="button">💾 حفظ</button>
        </div>
    </div>
</div>

<div id="ex-modal" class="modal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true">
        <div class="modal-header"><h3 style="margin:0">تعديل امتحان</h3>
            <button id="ex-close" class="btn secondary" type="button">إغلاق</button>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:8px">
            <input id="emx-subj" placeholder="المادة"><input id="emx-type" placeholder="النوع">
            <input id="emx-date" type="date"><input id="emx-time" placeholder="الوقت">
            <input id="emx-duration" placeholder="المدة (دقيقة)"><input id="emx-url" placeholder="رابط الامتحان">
        </div>
        <div style="display:flex;justify-content:flex-end;gap:8px;margin-top:10px">
            <button id="ex-save" class="btn" type="button">💾 حفظ</button>
        </div>
    </div>
</div>

<script>
    // ===== Storage Keys =====
    const LS = {
        assignments: 'ruqi_student_assignments_v2',
        messages: 'ruqi_student_messages_v2',
        lectures: 'ruqi_lectures_v1',
        exams: 'ruqi_exams_v1',
        attendance: 'ruqi_attendance_v1',
        teacherSent: 'ruqi_teacher_sent_v1'
    };
    const save = (k, v) => localStorage.setItem(k, JSON.stringify(v));
    const load = (k, fb) => {
        try {
            return JSON.parse(localStorage.getItem(k)) ?? fb
        } catch {
            return fb
        }
    };

    // Seeds
    const seedAssignments = [
        {
            id: 1,
            title: "واجب 3 – الكسور",
            subject: "رياضيات",
            due: "2025-10-08",
            submitted: false,
            files: [],
            teacher: {score: null, note: null}
        }
    ];
    const seedLectures = [
        {
            id: 101,
            day: 'الأحد',
            time: '09:00 - 09:45',
            subject: 'رياضيات',
            teacher: 'محمود س.',
            joinUrl: 'https://meet.example.com/math-101'
        }
    ];
    const seedExams = [
        {id: 201, subject: 'علوم', type: 'قصير', date: '2025-10-13', time: '10:00', duration: 30, url: '', grades: []},
        {
            id: 202,
            subject: 'رياضيات',
            type: 'شهري',
            date: '2025-10-20',
            time: '09:00',
            duration: 45,
            url: 'https://exam.example.com/math',
            grades: []
        }
    ];
    const seedMessages = [];
    let assignments = load(LS.assignments, seedAssignments);
    let lectures = load(LS.lectures, seedLectures);
    let exams = load(LS.exams, seedExams);
    let messages = load(LS.messages, seedMessages);
    let teacherSent = load(LS.teacherSent, []);

    // ===== Nav =====
    const menuLinks = document.querySelectorAll('#menu a[href^="#"]');
    const sections = document.querySelectorAll('.section');
    const titleEl = document.getElementById('page-title');
    const sub = document.getElementById('teacher-sub');
    const toggleBtn = document.querySelector('.toggle[data-target="#teacher-sub"]');
    toggleBtn.addEventListener('click', () => {
        const open = !sub.classList.contains('show');
        sub.classList.toggle('show', open);
        toggleBtn.querySelector('.arrow').style.transform = open ? 'rotate(180deg)' : 'rotate(0deg)';
    });

    function setActive(hash) {
        menuLinks.forEach(a => a.classList.toggle('active', a.getAttribute('href') === hash));
        sections.forEach(sec => sec.classList.toggle('active', '#' + sec.id === hash));
        const map = {
            '#overview': 'الصفحة الرئيسية',
            '#lectures': 'إدارة المحاضرات',
            '#students': 'إدارة الطلاب',
            '#exams': 'إدارة الامتحانات',
            '#add-assignment': 'تقييم الواجبات',
            '#show-assignments': 'تقييم الواجبات',
            '#grade-assignments': 'تقييم الواجبات',
            '#attendance': 'الحضور والغياب',
            '#messages': 'رسائل للطلبة',
            '#settings': 'الإعدادات'
        };
        titleEl.textContent = map[hash] || 'الصفحة الرئيسية';
        if (Object.keys(map).includes(hash)) {
            sub.classList.add('show');
            toggleBtn.querySelector('.arrow').style.transform = 'rotate(180deg)';
        }
    }

    menuLinks.forEach(a => a.addEventListener('click', e => {
        e.preventDefault();
        const h = a.getAttribute('href');
        history.pushState(null, '', h);
        setActive(h)
    }));

    // ===== KPIs =====
    function updateKPIs() {
        document.getElementById('k-lectures').textContent = lectures.filter(l => l.joinUrl).length;
        document.getElementById('k-exams').textContent = exams.length;
        document.getElementById('k-to-grade').textContent = assignments.filter(a => a.submitted && (a.teacher.score == null && !a.teacher.note)).length;
    }

    // ===== Lectures CRUD =====
    const tbLect = document.getElementById('lectures-body');
    const lcAdd = document.getElementById('lc-add');

    function renderLectures() {
        tbLect.innerHTML = '';
        lectures.forEach(l => {
            const tr = document.createElement('tr');
            const urlCell = l.joinUrl ? `<a href="${l.joinUrl}" target="_blank" rel="noopener">انضمام</a>` : '<span style="color:#94a3b8">غير متاح</span>';
            tr.innerHTML = `<td>${l.day || '—'}</td><td>${l.time || '—'}</td><td>${l.subject || '—'}</td><td>${l.teacher || '—'}</td><td>${urlCell}</td>
      <td><button class="btn ghost" data-edit="${l.id}">تعديل</button> <button class="btn danger" data-del="${l.id}">حذف</button></td>`;
            tbLect.appendChild(tr);
        });
        tbLect.querySelectorAll('[data-del]').forEach(b => b.addEventListener('click', () => {
            const id = +b.dataset.del;
            lectures = lectures.filter(x => x.id !== id);
            save(LS.lectures, lectures);
            renderLectures();
            updateKPIs();
        }));
        tbLect.querySelectorAll('[data-edit]').forEach(b => b.addEventListener('click', () => openLectureEdit(+b.dataset.edit)));
    }

    lcAdd.addEventListener('click', () => {
        const day = lc('lc-day'), time = lc('lc-time'), subj = lc('lc-subj'), teach = lc('lc-teacher'),
            url = lc('lc-url');
        if (!day || !time || !subj) {
            alert('اليوم والوقت والمادة مطلوبة.');
            return;
        }
        lectures.unshift({id: Date.now(), day, time, subject: subj, teacher: teach, joinUrl: url});
        save(LS.lectures, lectures);
        renderLectures();
        updateKPIs();
        ['lc-day', 'lc-time', 'lc-subj', 'lc-teacher', 'lc-url'].forEach(id => gid(id).value = '');
    });
    // lecture modal
    const lecModal = gid('lec-modal'), lecClose = gid('lec-close'), emDay = gid('em-day'), emTime = gid('em-time'),
        emSubj = gid('em-subj'), emTeach = gid('em-teacher'), emUrl = gid('em-url'), lecSave = gid('lec-save');
    let lecEditId = null;

    function openLectureEdit(id) {
        lecEditId = id;
        const l = lectures.find(x => x.id === id);
        emDay.value = l.day || '';
        emTime.value = l.time || '';
        emSubj.value = l.subject || '';
        emTeach.value = l.teacher || '';
        emUrl.value = l.joinUrl || '';
        show(lecModal, true);
    }

    lecClose.addEventListener('click', () => show(lecModal, false));
    lecModal.addEventListener('click', e => {
        if (e.target === lecModal) show(lecModal, false)
    });
    lecSave.addEventListener('click', () => {
        if (lecEditId == null) return;
        const i = lectures.findIndex(x => x.id === lecEditId);
        if (i >= 0) {
            lectures[i] = {
                ...lectures[i],
                day: emDay.value.trim(),
                time: emTime.value.trim(),
                subject: emSubj.value.trim(),
                teacher: emTeach.value.trim(),
                joinUrl: emUrl.value.trim()
            };
            save(LS.lectures, lectures);
            renderLectures();
            updateKPIs();
            show(lecModal, false);
        }
    });

    // ===== Exams CRUD =====
    const tbExams = gid('exams-body'), exAdd = gid('ex-add'), exSelect = gid('ex-select'),
        tbGrades = gid('ex-grade-body');

    function renderExams() {
        tbExams.innerHTML = '';
        exams.sort((a, b) => a.date.localeCompare(b.date));
        let i = 0;
        exams.forEach(x => {
            const url = x.url ? `<a href="${x.url}" target="_blank" rel="noopener">انضمام</a>` : '<span style="color:#94a3b8">—</span>';
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${++i}</td><td>${x.subject}</td><td>${x.type || '—'}</td><td>${x.date}</td><td>${x.time || '—'}</td><td>${x.duration || '—'}</td><td>${url}</td>
      <td><button class="btn ghost" data-editx="${x.id}">تعديل</button> <button class="btn danger" data-delx="${x.id}">حذف</button></td>`;
            tbExams.appendChild(tr);
        });
        // select list
        exSelect.innerHTML = exams.map(e => `<option value="${e.id}">${e.subject} — ${e.type || 'امتحان'} — ${e.date}</option>`).join('') || '<option value="">لا يوجد امتحانات</option>';
        // bind
        tbExams.querySelectorAll('[data-delx]').forEach(b => b.addEventListener('click', () => {
            const id = +b.dataset.delx;
            exams = exams.filter(e => e.id !== id);
            save(LS.exams, exams);
            renderExams();
            renderExamGrades();
            updateKPIs();
        }));
        tbExams.querySelectorAll('[data-editx]').forEach(b => b.addEventListener('click', () => openExamEdit(+b.dataset.editx)));
    }

    exAdd.addEventListener('click', () => {
        const subj = lc('ex-subj'), type = lc('ex-type'), date = lc('ex-date'), time = lc('ex-time'),
            duration = lc('ex-duration'), url = lc('ex-url');
        if (!subj || !date) {
            alert('المادة والتاريخ مطلوبة.');
            return;
        }
        exams.unshift({id: Date.now(), subject: subj, type, date, time, duration, url, grades: []});
        save(LS.exams, exams);
        renderExams();
        updateKPIs();
        ['ex-subj', 'ex-type', 'ex-date', 'ex-time', 'ex-duration', 'ex-url'].forEach(id => gid(id).value = '');
    });
    // exam modal
    const exModal = gid('ex-modal'), exClose = gid('ex-close'), emxSubj = gid('emx-subj'), emxType = gid('emx-type'),
        emxDate = gid('emx-date'), emxTime = gid('emx-time'), emxDuration = gid('emx-duration'),
        emxUrl = gid('emx-url'), exSave = gid('ex-save');
    let exEditId = null;

    function openExamEdit(id) {
        exEditId = id;
        const e = exams.find(x => x.id === id);
        if (!e) return;
        emxSubj.value = e.subject || '';
        emxType.value = e.type || '';
        emxDate.value = e.date || '';
        emxTime.value = e.time || '';
        emxDuration.value = e.duration || '';
        emxUrl.value = e.url || '';
        show(exModal, true);
    }

    exClose.addEventListener('click', () => show(exModal, false));
    exModal.addEventListener('click', e => {
        if (e.target === exModal) show(exModal, false)
    });
    exSave.addEventListener('click', () => {
        if (exEditId == null) return;
        const i = exams.findIndex(x => x.id === exEditId);
        if (i < 0) return;
        exams[i] = {
            ...exams[i],
            subject: emxSubj.value.trim(),
            type: emxType.value.trim(),
            date: emxDate.value,
            time: emxTime.value.trim(),
            duration: emxDuration.value.trim(),
            url: emxUrl.value.trim()
        };
        save(LS.exams, exams);
        renderExams();
        updateKPIs();
        show(exModal, false);
    });

    // ===== Exam Grades (per exam) =====
    function renderExamGrades() {
        tbGrades.innerHTML = '';
        const exId = +exSelect.value;
        const ex = exams.find(e => e.id === exId);
        if (!ex || !Array.isArray(ex.grades)) return;
        ex.grades.forEach((g, idx) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${idx + 1}</td><td>${g.name}</td><td>${g.score}</td><td>${g.note || '—'}</td><td><button class="btn danger" data-rm="${idx}">✕</button></td>`;
            tbGrades.appendChild(tr);
        });
        tbGrades.querySelectorAll('[data-rm]').forEach(b => b.addEventListener('click', () => {
            const ix = +b.dataset.rm;
            ex.grades.splice(ix, 1);
            save(LS.exams, exams);
            renderExamGrades();
        }));
    }

    exSelect.addEventListener('change', renderExamGrades);
    gid('ex-grade-add').addEventListener('click', () => {
        const exId = +exSelect.value;
        if (!exId) {
            alert('اختر امتحانًا أولًا.');
            return;
        }
        const ex = exams.find(e => e.id === exId);
        if (!ex) return;
        const name = lc('ex-student'), score = lc('ex-score'), note = lc('ex-note');
        if (!name || !score) {
            alert('اسم الطالب والدرجة مطلوبة.');
            return;
        }
        ex.grades.push({name, score, note, at: new Date().toISOString()});
        save(LS.exams, exams);
        renderExamGrades();
        // إشعار للطالب (رسالة عامة – محاكاة)
        const msg = {
            id: Date.now(),
            text: `📌 تمت إضافة درجة امتحان ${ex.subject} (${ex.type || 'امتحان'}): ${score} — للطالب ${name}.`,
            date: new Date().toISOString().slice(0, 10),
            unread: true
        };
        messages.unshift(msg);
        save(LS.messages, messages);
        alert('تم حفظ الدرجة وإشعار الطالب (محاكاة).');
    });

    // Export CSV
    gid('ex-export').addEventListener('click', () => {
        const exId = +exSelect.value;
        const ex = exams.find(e => e.id === exId);
        if (!ex) {
            alert('اختر امتحانًا.');
            return;
        }
        const rows = [['Subject', 'Type', 'Date', 'Time', 'Duration', 'Student', 'Score', 'Note', 'At']];
        (ex.grades || []).forEach(g => rows.push([ex.subject, ex.type || '', ex.date || '', ex.time || '', ex.duration || '', g.name || '', g.score || '', g.note || '', g.at || '']));
        const csv = rows.map(r => r.map(v => `"${String(v).replace(/"/g, '""')}"`).join(',')).join('\n');
        const blob = new Blob([csv], {type: 'text/csv;charset=utf-8;'});
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `exam-${ex.subject}-${ex.date}.csv`;
        a.click();
        URL.revokeObjectURL(url);
    });

    // ===== Grade Assignments (existing) =====
    const tbGrade = document.getElementById('grade-body');

    function renderToGrade() {
        tbGrade.innerHTML = '';
        let i = 0;
        assignments.filter(a => a.submitted).forEach(a => {
            const files = a.files?.length ? a.files.map(f => f.name).join('، ') : '—';
            const tr = document.createElement('tr');
            tr.innerHTML = `<td>${++i}</td><td>${a.title}</td><td>${a.subject}</td><td>${new Date(a.due).toLocaleDateString('ar-EG')}</td><td>${files}</td>
      <td><input data-score="${a.id}" placeholder="مثال: 18/20 أو 90" style="width:120px"></td>
      <td><input data-note="${a.id}" placeholder="ملاحظة"></td>
      <td><button class="btn" data-save="${a.id}">حفظ</button></td>`;
            tbGrade.appendChild(tr);
            const s = tr.querySelector(`[data-score="${a.id}"]`), n = tr.querySelector(`[data-note="${a.id}"]`);
            if (a.teacher?.score != null) s.value = a.teacher.score;
            if (a.teacher?.note) n.value = a.teacher.note;
        });
        tbGrade.querySelectorAll('[data-save]').forEach(b => b.addEventListener('click', () => {
            const id = +b.dataset.save;
            const s = tbGrade.querySelector(`[data-score="${id}"]`).value.trim();
            const n = tbGrade.querySelector(`[data-note="${id}"]`).value.trim();
            const i = assignments.findIndex(x => x.id === id);
            if (i < 0) return;
            if (!s && !n) {
                alert('أدخل درجة أو ملاحظة.');
                return;
            }
            assignments[i].teacher = {score: s || null, note: n || null, gradedAt: new Date().toISOString()};
            save(LS.assignments, assignments);
            const msg = {
                id: Date.now(),
                text: `📌 تم تقييم واجب: «${assignments[i].title}» — الدرجة: ${s || '—'}.`,
                date: new Date().toISOString().slice(0, 10),
                unread: true
            };
            messages.unshift(msg);
            save(LS.messages, messages);
            alert('تم الحفظ والإشعار (محاكاة).');
            updateKPIs();
        }));
    }

    // ===== Attendance =====
    const atBody = gid('at-body');
    gid('at-add-row').addEventListener('click', () => addAttendanceRow());
    gid('at-save').addEventListener('click', () => {
        const klass = lc('at-class') || 'غير محدد';
        const date = lc('at-date') || new Date().toISOString().slice(0, 10);
        const rows = [...atBody.children].map(tr => ({
            name: tr.children[1].querySelector('input').value.trim(),
            status: tr.children[2].querySelector('select').value,
            note: tr.children[3].querySelector('input').value.trim()
        })).filter(r => r.name);
        if (!rows.length) {
            alert('أضف طالبًا واحدًا على الأقل.');
            return;
        }
        const all = load(LS.attendance, []);
        all.unshift({id: Date.now(), class: klass, date, rows});
        save(LS.attendance, all);
        alert('تم حفظ الحضور.');
        atBody.innerHTML = '';
    });

    function addAttendanceRow(name = '') {
        const tr = document.createElement('tr');
        tr.innerHTML = `<td></td><td><input placeholder="اسم الطالب" value="${name}"></td>
  <td><select><option value="present">حضور</option><option value="absent">غياب</option><option value="excused">غياب مبرر</option></select></td>
  <td><input placeholder="ملاحظة (اختياري)"></td><td><button class="btn danger" type="button">✕</button></td>`;
        atBody.appendChild(tr);
        renumber();
        tr.querySelector('button').addEventListener('click', () => {
            tr.remove();
            renumber();
        });
    }

    function renumber() {
        [...atBody.children].forEach((tr, i) => tr.children[0].textContent = i + 1);
    }

    // ===== Messages =====
    const sentWrap = gid('sent-msgs');
    gid('msg-send').addEventListener('click', () => {
        const to = lc('msg-to'), txt = lc('msg-text');
        if (!txt) {
            alert('اكتب نص الرسالة.');
            return;
        }
        const msg = {
            id: Date.now(),
            text: (to ? `👤 (${to}) ` : '') + txt,
            date: new Date().toISOString().slice(0, 10),
            unread: true
        };
        messages.unshift(msg);
        save(LS.messages, messages);
        teacherSent.unshift(msg);
        save(LS.teacherSent, teacherSent);
        renderSent();
        updateKPIs();
        gid('msg-text').value = '';
        gid('msg-to').value = '';
        alert('تم الإرسال (محاكاة).');
    });

    function renderSent() {
        sentWrap.innerHTML = '';
        teacherSent.forEach(m => {
            const d = document.createElement('div');
            d.className = 'card';
            d.innerHTML = `<div>${m.text}</div><div style="color:#64748b;font-size:12px">${new Date(m.date).toLocaleDateString('ar-EG')}</div>`;
            sentWrap.appendChild(d);
        });
    }

    // ===== Settings =====
    gid('reset-seed').addEventListener('click', () => {
        localStorage.removeItem(LS.assignments);
        localStorage.removeItem(LS.lectures);
        localStorage.removeItem(LS.messages);
        localStorage.removeItem(LS.attendance);
        localStorage.removeItem(LS.teacherSent);
        localStorage.removeItem(LS.exams);
        assignments = seedAssignments.slice();
        lectures = seedLectures.slice();
        messages = [];
        teacherSent = [];
        exams = seedExams.slice();
        save(LS.assignments, assignments);
        save(LS.lectures, lectures);
        save(LS.messages, messages);
        save(LS.teacherSent, teacherSent);
        save(LS.exams, exams);
        renderLectures();
        renderToGrade();
        renderSent();
        renderExams();
        renderExamGrades();
        updateKPIs();
        alert('تم مسح/إعادة ضبط البيانات التجريبية.');
    });
    gid('seed-data').addEventListener('click', () => {
        assignments = seedAssignments.slice();
        lectures = seedLectures.slice();
        messages = [];
        teacherSent = [];
        exams = seedExams.slice();
        save(LS.assignments, assignments);
        save(LS.lectures, lectures);
        save(LS.messages, messages);
        save(LS.teacherSent, teacherSent);
        save(LS.exams, exams);
        renderLectures();
        renderToGrade();
        renderSent();
        renderExams();
        renderExamGrades();
        updateKPIs();
        alert('تمت تهيئة بيانات تجريبية.');
    });

    // ===== Helpers =====
    function gid(id) {
        return document.getElementById(id)
    }

    function lc(id) {
        return gid(id).value.trim()
    }

    function show(el, on) {
        el.classList.toggle('show', on);
        el.setAttribute('aria-hidden', on ? 'false' : 'true')
    }

    // ===== Init =====
    const initial = location.hash && document.querySelector(location.hash) ? location.hash : '#overview';
    setActive(initial);
    sub.classList.add('show');
    toggleBtn.querySelector('.arrow').style.transform = 'rotate(180deg)';
    renderLectures();
    renderToGrade();
    renderSent();
    renderExams();
    renderExamGrades();
    updateKPIs();
    window.addEventListener('popstate', () => setActive(location.hash || '#overview'));
</script>
</body>
</html>
