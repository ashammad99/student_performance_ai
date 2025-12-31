<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رُقي | لوحة الطالب</title>
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

        /* Sidebar */
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

        .sb-badge.gray {
            background: #cbd5e1;
            color: #0f172a
        }

        /* Main */
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
            padding: 10px 14px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: 700
        }

        .btn.secondary {
            background: #64748b
        }

        .btn.ghost {
            background: #eef2ff;
            color: #1d4ed8
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

        .badge.done {
            background: #dcfce7;
            color: #166534
        }

        .badge.late {
            background: #fee2e2;
            color: #991b1b
        }

        .actions a {
            color: #2563eb;
            text-decoration: none;
            margin-inline-start: 8px;
            cursor: pointer
        }

        /* Filters row */
        .filters {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 10px
        }

        .filters input, .filters select {
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 10px;
            color: var(--text);
            background: #fff
        }

        /* Sections */
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

        /* Modals (Upload + Details) */
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

        .dropzone {
            border: 2px dashed #c7d2fe;
            background: #f8fafc;
            padding: 18px;
            border-radius: 14px;
            text-align: center;
            color: #1e3a8a
        }

        .dropzone.drag {
            background: #eef2ff;
            border-color: #3B82F6
        }

        .progress {
            height: 10px;
            background: #e5e7eb;
            border-radius: 999px;
            overflow: hidden;
            margin-top: 10px
        }

        .progress > div {
            height: 100%;
            width: 0;
            background: #3B82F6
        }

        .files {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 8px
        }

        .file-pill {
            border: 1px solid var(--border);
            background: #fff;
            border-radius: 999px;
            padding: 6px 10px;
            font-size: 13px
        }

        .file-pill button {
            background: transparent;
            border: none;
            color: #ef4444;
            margin-inline-start: 6px;
            cursor: pointer
        }

        /* Messages */
        .msg {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            background: #f8fafc;
            border: 1px solid var(--border);
            padding: 10px;
            border-radius: 12px
        }

        .msg.unread {
            background: #f1f5ff;
            border-color: #dbeafe
        }

        .msg .meta {
            font-size: 12px;
            color: #64748b
        }

        /* Canvas chart card */
        #gradesChart {
            width: 100%;
            height: 260px;
            border: 1px solid var(--border);
            border-radius: 12px
        }

        /* Responsive */
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
    <!-- Sidebar -->
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
                <button class="toggle" data-target="#student-sub">
                    <img src="https://cdn-icons-png.flaticon.com/512/201/201818.png" alt="الطالب"
                         style="width:20px;height:20px;object-fit:contain">
                    <span>الطالب</span>
                    <span id="sb-assignments-badge" class="sb-badge">0</span>
                    <span class="arrow">▾</span>
                </button>
                <ul id="student-sub" class="submenu show">
                    <li>
                        <a href="#assignments">
                            📝 الواجبات المستحقة
                            <span id="sb-assignments-badge-inline" class="sb-badge">0</span>
                        </a>
                    </li>
                    <li><a href="#assignments">🎓 الواجبات</a></li>
                    <li><a href="#exams">🧪 الاختبارات والتقييم</a></li>
                    <li><a href="#attendance">🗓️ الحضور والغياب</a></li>
                    <li><a href="#grades">📊 علاماتي</a></li>
                    <li>
                        <a href="#messages">
                            💬 الرسائل
                            <span id="sb-unread" class="sb-badge gray">0</span>
                        </a>
                    </li>
                    <li style="list-style: none; margin: 0; padding: 0;">
                        <form action="{{ route('student.logout') }}" method="post" style="display: inline;">
                            @csrf
                            <button type="submit" style="
            background: none;
            border: none;
            color: #ece6e6;
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

    <!-- Main -->
    <main class="main">
        <div class="hero">
            <h1> مرحبا، {{Auth::guard('student')->user()->name}}</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('success'))
            <div
                style="background-color:#d4edda; color:#155724; border:1px solid #c3e6cb; padding:10px 15px; border-radius:5px; margin-bottom:10px;">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('info'))
            <div class="alert alert-info">
                {{ Session::get('info') }}
            </div>
        @endif
        @if (Session::has('warning'))
            <div class="alert alert-warning">
                {{ Session::get('warning') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div
                style="background-color:#de6fa9; color:#cc2020; border:1px solid #e8898b; padding:10px 15px; border-radius:5px; margin-bottom:10px;">
                {{ Session::get('error') }}
            </div>
        @endif
        <!-- Overview -->
        <section id="overview" class="section active">
            <div class="stats">
                <div class="card"><p class="k">نسبة الحضور</p>
                    <p class="v">{{ $percentage }}%</p></div>
                <div class="card"><p class="k">واجبات غير مسلّمة</p>
                    <p class="v" id="home-due-count">{{$pendingAssignmentsCount}}</p></div>
            </div>
        </section>

        <!-- Assignments -->
        <section id="assignments" class="section">
            <div class="card">
                <h3 style="margin:0 0 10px;color:var(--text)">الواجبات المستحقة</h3>

                <div class="filters">
                    <input id="q" type="search" placeholder="ابحث بالعنوان أو المادة…">
                    <select id="status">
                        <option value="all">كل الحالات</option>
                        <option value="today">مستحق اليوم</option>
                        <option value="soon">قرب الموعد (≤ 2 يوم)</option>
                        <option value="later">متبقٍ أكثر من يومين</option>
                        <option value="done">تم التسليم</option>
                        <option value="graded">مُقَيَّم</option>
                    </select>
                </div>

                <table>
                    <thead>
                    <tr>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th>المعلم</th>
                        <th>تاريخ الإضافة</th>
                        <th>تاريخ التسليم</th>
                        <th>إجراء</th>
                    </tr>
                    </thead>
                    <tbody id="assignments-body">
                    @forelse($pendingAssignments as $assignment)
                        <tr>
                            <td>{{ $assignment->title }}</td>
                            <td>{{ $assignment->description }}</td>
                            <td>{{ $assignment->teacher->name ?? '-' }}</td>
                            <td>{{ $assignment->created_at->format('Y-m-d') }}</td>
                            <td>{{ $assignment->due_date }}</td>
                            <td>
                                <!-- زر التقديم -->
                                <a href="{{route('student.assignments',$assignment->id)}}">التقديم الان
                                </a>

                                <!-- فورم مخفي للرفع -->
                                <div id="submit-form-{{ $assignment->id }}" style="display:none; margin-top:10px;">
                                    <form action="{{ route('student.assignments.submit', $assignment->id) }}"
                                          method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" required>
                                        <input type="text" name="notes" placeholder="ملاحظة..." style="width:150px;">
                                        <button type="submit"
                                                style="background:#007bff; color:white; padding:5px 10px; border:none; border-radius:4px;">
                                            رفع
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding:15px;">لا توجد واجبات مستحقة حالياً</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Lectures -->
        <section id="lectures" class="section">
            <div class="card">
                <h3 style="margin-top:0;color:var(--text)">جدول المحاضرات</h3>
                <table>
                    <thead>
                    <tr>
                        <th>اليوم</th>
                        <th>الوقت</th>
                        <th>المادة</th>
                        <th>المعلّم</th>
                        <th>رابط</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>الأحد</td>
                        <td>09:00 - 09:45</td>
                        <td>رياضيات</td>
                        <td>محمود س.</td>
                        <td><a href="#">انضمام</a></td>
                    </tr>
                    <tr>
                        <td>الإثنين</td>
                        <td>10:00 - 10:45</td>
                        <td>علوم</td>
                        <td>سارة ع.</td>
                        <td><a href="#">انضمام</a></td>
                    </tr>
                    <tr>
                        <td>الثلاثاء</td>
                        <td>11:00 - 11:45</td>
                        <td>لغة عربية</td>
                        <td>منى ر.</td>
                        <td><a href="#">انضمام</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Exams -->
        <section id="exams" class="section">
            <div class="card">
                <h3 style="margin-top:0;color:var(--text)">الاختبارات والتقييم</h3>
                <table>
                    <thead>
                    <tr>
                        <th>العنوان</th>
                        <th>الوصف</th>
                        <th>المعلم</th>
                        <th>تاريخ الإضافة</th>
                        <th>الحالة</th>
                        <th>الدرجة</th>
                        <th>ملاحظات المعلم</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach($assignments as $assignment)
                        @php
                            $submission = $assignment->submissions->first();
                        @endphp
                        <tr>
                            <td>{{ $assignment->title }}</td>
                            <td>{{ $assignment->description }}</td>
                            <td>{{ $assignment->teacher->name ?? '-' }}</td>
                            <td>{{ $assignment->created_at->format('Y-m-d') }}</td>
                            <td>
                                @if($submission)
                                    <span style="color:green;">✅ تم التسليم</span>
                                @else
                                    <span style="color:red;">❌ لم يُسلّم بعد</span>
                                @endif
                            </td>
                            <td>{{ $submission->grade ?? '-' }}</td>
                            <td>{{ $submission->feedback ?? '-' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Attendance -->
        <section id="attendance" class="section">
            <div class="card">
                <h3 style="margin-top:0;color:var(--text)">الحضور والغياب</h3>
                <table>
                    <thead>
                    <tr>
                        <th style="padding:10px; border:1px solid #ddd;">التاريخ</th>
                        <th style="padding:10px; border:1px solid #ddd;">الحالة</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($records as $record)
                        <tr>
                            <td style="padding:10px; border:1px solid #ddd;">{{ $record->created_at->format('Y-m-d') }}</td>
                            <td style="padding:10px; border:1px solid #ddd; color:{{ $record->status == 'حاضر' ? 'green' : 'red' }};">
                                {{ $record->status }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" style="padding:15px;">لا توجد بيانات حضور بعد</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Grades -->
        <section id="grades" class="section">
            <div class="stats">
                <div class="card"><p class="k">متوسط الرياضيات</p>
                    <p class="v">88</p></div>
                <div class="card"><p class="k">متوسط العلوم</p>
                    <p class="v">91</p></div>
                <div class="card"><p class="k">متوسط العربية</p>
                    <p class="v">84</p></div>
            </div>

            <div class="card" style="margin-top:14px">
                <h3 style="margin:0 0 10px;color:var(--text)">توزيع درجات الواجبات المُقَيَّمة</h3>
                <canvas id="gradesChart"></canvas>
            </div>
        </section>

        <!-- Messages -->
        <section id="messages" class="section">
            <div class="card">
                <h3 style="margin:0 0 10px;color:var(--text)">الرسائل</h3>
                <div id="msgs" style="display:grid;gap:10px"></div>
            </div>
        </section>

        <!-- Settings -->
        <section id="settings" class="section">
            <div class="card">
                <h3 style="margin:0 0 10px;color:var(--text)">الإعدادات</h3>
                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:12px">
                    <div>
                        <label style="color:var(--text-sub)">البريد</label>
                        <input type="email" placeholder="student@example.com"
                               style="width:100%;padding:10px;border:1px solid var(--border);border-radius:10px;color:var(--text)">
                    </div>
                    <div>
                        <label style="color:var(--text-sub)">الهاتف</label>
                        <input type="tel" placeholder="0599-xxxxxx"
                               style="width:100%;padding:10px;border:1px solid var(--border);border-radius:10px;color:var(--text)">
                    </div>
                    <div style="grid-column:1/-1;display:flex;gap:8px;align-items:center">
                        <button id="mock-grade" class="btn ghost" type="button">🎯 محاكاة: إضافة تقييم معلّم</button>
                        <small style="color:#64748b">للاختبار المحلي فقط</small>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<!-- Upload Modal -->
<div id="upload-modal" class="modal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="upl-title">
        <div class="modal-header">
            <h3 id="upl-title" style="margin:0;color:var(--text)">رفع حل الواجب</h3>
            <button id="upl-close" class="btn secondary" type="button">إغلاق</button>
        </div>
        <div id="upl-meta" style="margin-bottom:10px;color:var(--text-sub)"></div>
        <div id="drop" class="dropzone">
            اسحب الملفات وأفلِتها هنا أو
            <label style="text-decoration:underline;cursor:pointer"> اختر ملفات
                <input id="upl-file" type="file" hidden multiple
                       accept=".pdf,.doc,.docx,.ppt,.pptx,.zip,.rar,.jpg,.jpeg,.png,.txt"/>
            </label>
            <div style="margin-top:6px;font-size:12px;color:#64748b">حد مقترح: 25MB لكل ملف</div>
        </div>
        <div id="files" class="files"></div>
        <div class="progress" aria-hidden="true">
            <div id="upl-bar"></div>
        </div>
        <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:12px">
            <button id="upl-send" class="btn" type="button">📤 رفع</button>
        </div>
    </div>
</div>

<!-- Details Modal -->
<div id="details-modal" class="modal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="det-title">
        <div class="modal-header">
            <h3 id="det-title" style="margin:0;color:var(--text)">تفاصيل الواجب</h3>
            <button id="det-close" class="btn secondary" type="button">إغلاق</button>
        </div>
        <div id="det-body" style="display:grid;gap:8px">
            <!-- Filled by JS -->
        </div>
    </div>
</div>

<script>
    // ---------- LocalStorage ----------
    const LS = {
        assignments: 'ruqi_student_assignments_v2',
        messages: 'ruqi_student_messages_v2'
    };
    const save = (k, v) => localStorage.setItem(k, JSON.stringify(v));
    const load = (k, fb) => {
        try {
            return JSON.parse(localStorage.getItem(k)) ?? fb
        } catch {
            return fb
        }
    };

    // ---------- Seed Data ----------
    const seedAssignments = [
        {
            id: 1,
            title: "واجب 3 – الكسور",
            subject: "رياضيات",
            due: "2025-10-08",
            submitted: false,
            files: [],
            teacher: {score: null, note: null}
        },
        {
            id: 2,
            title: "تقرير المختبر",
            subject: "علوم",
            due: "2025-10-09",
            submitted: false,
            files: [],
            teacher: {score: null, note: null}
        },
        {
            id: 3,
            title: "قطعة تعبير",
            subject: "لغة عربية",
            due: "2025-10-11",
            submitted: false,
            files: [],
            teacher: {score: null, note: null}
        }
    ];
    const seedMessages = [
        {id: 101, text: "📣 اختبار علوم الخميس 13/10 الساعة 10:00.", date: "2025-10-07", unread: true},
        {id: 102, text: "📝 تذكير: تسليم واجب العربية قبل الأحد 16/10.", date: "2025-10-06", unread: true},
    ];

    let assignmentsData = load(LS.assignments, seedAssignments);
    let messagesData = load(LS.messages, seedMessages);

    // ---------- Nav / Sections ----------
    const menuLinks = document.querySelectorAll('#menu a[href^="#"]');
    const sections = document.querySelectorAll('.section');
    const titleEl = document.getElementById('page-title');
    const studentSub = document.getElementById('student-sub');
    const toggleBtn = document.querySelector('.toggle[data-target="#student-sub"]');

    toggleBtn.addEventListener('click', () => {
        const open = !studentSub.classList.contains('show');
        studentSub.classList.toggle('show', open);
        toggleBtn.querySelector('.arrow').style.transform = open ? 'rotate(180deg)' : 'rotate(0deg)';
    });

    function setActive(hash) {
        menuLinks.forEach(a => a.classList.toggle('active', a.getAttribute('href') === hash));
        sections.forEach(sec => sec.classList.toggle('active', '#' + sec.id === hash));
        const map = {
            '#overview': 'الصفحة الرئيسية',
            '#assignments': 'الواجبات المستحقة',
            '#exams': 'الاختبارات والتقييم',
            '#attendance': 'الحضور والغياب',
            '#grades': 'علاماتي',
            '#messages': 'الرسائل',
            '#settings': 'الإعدادات'
        };
        titleEl.textContent = map[hash] || 'الصفحة الرئيسية';
        if (['#assignments', '#lectures', '#exams', '#attendance', '#grades', '#messages', '#settings'].includes(hash)) {
            studentSub.classList.add('show');
            toggleBtn.querySelector('.arrow').style.transform = 'rotate(180deg)';
        }
        if (hash === '#grades') drawGradesChart(); // تحديث الرسم عند فتح القسم
        if (hash === '#messages') renderMessages();
    }

    menuLinks.forEach(a => {
        a.addEventListener('click', e => {
            e.preventDefault();
            const hash = a.getAttribute('href');
            history.pushState(null, '', hash);
            setActive(hash);
        });
    });

    // ---------- Utils ----------
    function daysLeft(dueISO) {
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const due = new Date(dueISO);
        due.setHours(0, 0, 0, 0);
        return Math.round((due - today) / 86400000);
    }

    function statusLabel(left, submitted) {
        if (submitted) return {text: 'تم التسليم', cls: 'done'};
        if (left < 0) return {text: `متأخر ${Math.abs(left)} يوم`, cls: 'late'};
        if (left === 0) return {text: 'مستحق اليوم', cls: 'today'};
        if (left === 1 || left === 2) return {text: 'قرب الموعد', cls: 'soon'};
        return {text: `متبقٍ ${left} يوم`, cls: 'later'};
    }

    // ---------- Badges + Home counters ----------
    function updateBadges() {
        const dueCount = assignmentsData.filter(a => !a.submitted).length;
        document.getElementById('sb-assignments-badge').textContent = dueCount;
        document.getElementById('sb-assignments-badge-inline').textContent = dueCount;
        document.getElementById('home-due-count').textContent = dueCount;
        const unread = messagesData.filter(m => m.unread).length;
        document.getElementById('sb-unread').textContent = unread;
    }

    // ---------- Assignments table ----------
    const tbody = document.getElementById('assignments-body');
    const q = document.getElementById('q');
    const status = document.getElementById('status');

    function renderAssignments() {
        const term = (q?.value || '').trim().toLowerCase();
        const st = status?.value || 'all';
        tbody.innerHTML = '';

        assignmentsData.forEach((a, idx) => {
            const left = daysLeft(a.due);
            const lab = statusLabel(left, a.submitted);

            const hay = (a.title + ' ' + a.subject).toLowerCase();
            if (term && !hay.includes(term)) return;

            if (st !== 'all') {
                if (st === 'today' && lab.cls !== 'today') return;
                if (st === 'soon' && lab.cls !== 'soon') return;
                if (st === 'later' && lab.cls !== 'later') return;
                if (st === 'done' && lab.cls !== 'done') return;
                if (st === 'graded' && (a.teacher.score == null && !a.teacher.note)) return;
            }

            const dueHuman = new Date(a.due).toLocaleDateString('ar-EG');
            let teacherCell = '—';
            if (a.teacher?.score != null || a.teacher?.note) {
                const score = a.teacher.score != null ? `${a.teacher.score}` : '';
                const note = a.teacher.note ? ` — <span title="${a.teacher.note}">${a.teacher.note}</span>` : '';
                teacherCell = `<span class="badge done">${score}${note}</span>`;
            }

            const submittedLabel = a.submitted
                ? (a.files?.length ? `✓ ${a.files.length} ملف` : '✓ مرفوع')
                : 'رفع الحل';

            const tr = document.createElement('tr');
            tr.innerHTML = `
        <td>${idx + 1}</td>
        <td>${a.title}</td>
        <td>${a.subject}</td>
        <td>${dueHuman}</td>
        <td><span class="badge ${lab.cls}">${lab.text}</span></td>
        <td>${teacherCell}</td>
        <td class="actions">
          ${a.submitted ? `<span style="color:#16a34a;font-weight:700">${submittedLabel}</span>` :
                `<a data-upload="${a.id}">رفع الحل</a>`}
          <a data-details="${a.id}">عرض التفاصيل</a>
        </td>
      `;
            tbody.appendChild(tr);
        });

        if (!tbody.children.length) {
            const tr = document.createElement('tr');
            tr.innerHTML = `<td colspan="7" style="text-align:center;color:#64748b">لا توجد عناصر مطابقة.</td>`;
            tbody.appendChild(tr);
        }

        tbody.querySelectorAll('[data-upload]').forEach(a => {
            a.addEventListener('click', () => openUploadModal(Number(a.getAttribute('data-upload'))));
        });
        tbody.querySelectorAll('[data-details]').forEach(a => {
            a.addEventListener('click', () => openDetailsModal(Number(a.getAttribute('data-details'))));
        });

        updateBadges();
    }

    q?.addEventListener('input', renderAssignments);
    status?.addEventListener('change', renderAssignments);

    // ---------- Upload Modal ----------
    const uplModal = document.getElementById('upload-modal');
    const uplClose = document.getElementById('upl-close');
    const uplFile = document.getElementById('upl-file');
    const drop = document.getElementById('drop');
    const bar = document.getElementById('upl-bar');
    const uplMeta = document.getElementById('upl-meta');
    const filesBox = document.getElementById('files');
    const uplSend = document.getElementById('upl-send');

    let currentAssignmentId = null;
    let pickedFiles = [];

    function openUploadModal(assignmentId) {
        currentAssignmentId = assignmentId;
        const a = assignmentsData.find(x => x.id === assignmentId);
        uplMeta.textContent = `الواجب: ${a.title} — المادة: ${a.subject}`;
        pickedFiles = [];
        filesBox.innerHTML = '';
        bar.style.width = '0%';
        uplModal.classList.add('show');
        uplModal.setAttribute('aria-hidden', 'false');
    }

    function closeUploadModal() {
        uplModal.classList.remove('show');
        uplModal.setAttribute('aria-hidden', 'true');
    }

    uplClose.addEventListener('click', closeUploadModal);
    uplModal.addEventListener('click', e => {
        if (e.target === uplModal) closeUploadModal();
    });

    function addPill(file) {
        const pill = document.createElement('span');
        pill.className = 'file-pill';
        pill.textContent = file.name;
        const rm = document.createElement('button');
        rm.textContent = '×';
        rm.addEventListener('click', () => {
            pickedFiles = pickedFiles.filter(f => f !== file);
            pill.remove();
        });
        pill.appendChild(rm);
        filesBox.appendChild(pill);
    }

    uplFile.addEventListener('change', e => {
        [...(e.target.files || [])].forEach(f => {
            pickedFiles.push(f);
            addPill(f);
        });
        e.target.value = '';
    });
    ;['dragenter', 'dragover'].forEach(evt => drop.addEventListener(evt, e => {
        e.preventDefault();
        drop.classList.add('drag');
    }));
    ;['dragleave', 'drop'].forEach(evt => drop.addEventListener(evt, e => {
        e.preventDefault();
        drop.classList.remove('drag');
    }));
    drop.addEventListener('drop', e => {
        [...(e.dataTransfer.files || [])].forEach(f => {
            pickedFiles.push(f);
            addPill(f);
        });
    });

    uplSend.addEventListener('click', () => {
        if (!pickedFiles.length) {
            alert('اختر ملفًا واحدًا على الأقل.');
            return;
        }
        let p = 0;
        const t = setInterval(() => {
            p = Math.min(p + 12, 100);
            bar.style.width = p + '%';
            if (p >= 100) {
                clearInterval(t);
                const a = assignmentsData.find(x => x.id === currentAssignmentId);
                a.submitted = true;
                a.files = pickedFiles.map(f => ({name: f.name, size: f.size || 0}));
                save(LS.assignments, assignmentsData);
                renderAssignments();
                closeUploadModal();
                alert('تم رفع الملفات وحفظ التسليم (محاكاة).');
            }
        }, 120);
    });

    // ---------- Details Modal ----------
    const detModal = document.getElementById('details-modal');
    const detClose = document.getElementById('det-close');
    const detBody = document.getElementById('det-body');

    function openDetailsModal(id) {
        const a = assignmentsData.find(x => x.id === id);
        if (!a) return;
        const left = daysLeft(a.due);
        const lab = statusLabel(left, a.submitted);
        const dueHuman = new Date(a.due).toLocaleDateString('ar-EG');
        const files = a.files?.length ? a.files.map(f => `<li>${f.name}</li>`).join('') : '<li>— لا توجد ملفات</li>';
        const teacher = (a.teacher?.score != null || a.teacher?.note)
            ? `<span class="badge done">${a.teacher.score ?? ''} ${a.teacher.note ? ('— ' + a.teacher.note) : ''}</span>`
            : '— لا يوجد حتى الآن';

        detBody.innerHTML = `
      <div><b>العنوان:</b> ${a.title}</div>
      <div><b>المادة:</b> ${a.subject}</div>
      <div><b>تاريخ التسليم:</b> ${dueHuman}</div>
      <div><b>الحالة:</b> <span class="badge ${lab.cls}">${lab.text}</span></div>
      <div><b>الملفات المرفوعة:</b><ul style="margin:6px 18px">${files}</ul></div>
      <div><b>تقييم المدرّس:</b> ${teacher}</div>
    `;
        detModal.classList.add('show');
        detModal.setAttribute('aria-hidden', 'false');
    }

    function closeDetailsModal() {
        detModal.classList.remove('show');
        detModal.setAttribute('aria-hidden', 'true');
    }

    detClose.addEventListener('click', closeDetailsModal);
    detModal.addEventListener('click', e => {
        if (e.target === detModal) closeDetailsModal();
    });

    // ---------- Messages ----------
    const msgsWrap = document.getElementById('msgs');

    function renderMessages() {
        msgsWrap.innerHTML = '';
        messagesData.sort((a, b) => new Date(b.date) - new Date(a.date)).forEach(m => {
            const div = document.createElement('div');
            div.className = 'msg' + (m.unread ? ' unread' : '');
            div.innerHTML = `
        <div>${m.text}<div class="meta">${new Date(m.date).toLocaleDateString('ar-EG')}</div></div>
        <div>${m.unread ? '<button class="btn secondary" data-read="' + m.id + '">تمت قراءته</button>' : ''}</div>
      `;
            msgsWrap.appendChild(div);
        });
        msgsWrap.querySelectorAll('[data-read]').forEach(b => {
            b.addEventListener('click', () => {
                const id = Number(b.getAttribute('data-read'));
                const m = messagesData.find(x => x.id === id);
                if (m) {
                    m.unread = false;
                    save(LS.messages, messagesData);
                    renderMessages();
                    updateBadges();
                }
            });
        });
        updateBadges();
    }

    // ---------- Grades Chart (Canvas 2D بدون مكتبات) ----------
    function parseScore(s) { // يدعم "18/20" أو "86/100" أو رقم مجرد
        if (s == null) return null;
        if (typeof s === 'number') return s;
        if (String(s).includes('/')) {
            const [a, b] = String(s).split('/').map(Number);
            if (!isNaN(a) && !isNaN(b) && b > 0) return Math.round((a / b) * 100);
        }
        const n = Number(s);
        return isNaN(n) ? null : n;
    }

    function getGradedPercents() {
        return assignmentsData
            .map(a => parseScore(a.teacher?.score))
            .filter(v => v != null);
    }

    function drawGradesChart() {
        const cvs = document.getElementById('gradesChart');
        const ctx = cvs.getContext('2d');
        // clear
        ctx.clearRect(0, 0, cvs.width, cvs.height);
        const W = cvs.clientWidth, H = cvs.clientHeight;
        // handle DPR
        const dpr = window.devicePixelRatio || 1;
        cvs.width = W * dpr;
        cvs.height = H * dpr;
        ctx.scale(dpr, dpr);

        // data buckets: <60, 60-69, 70-79, 80-89, 90-100
        const data = [0, 0, 0, 0, 0];
        getGradedPercents().forEach(p => {
            if (p < 60) data[0]++; else if (p < 70) data[1]++; else if (p < 80) data[2]++; else if (p < 90) data[3]++; else data[4]++;
        });
        const labels = ['<60', '60-69', '70-79', '80-89', '90-100'];
        const max = Math.max(1, ...data);
        const pad = 32, gap = 18;
        const barW = (W - pad * 2 - gap * (data.length - 1)) / data.length;
        // axes
        ctx.strokeStyle = '#e5e7eb';
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(pad, H - pad);
        ctx.lineTo(W - pad, H - pad);
        ctx.stroke();
        // bars
        for (let i = 0; i < data.length; i++) {
            const x = pad + i * (barW + gap);
            const h = Math.round((H - pad * 2) * (data[i] / max));
            const y = H - pad - h;
            ctx.fillStyle = '#3B82F6';
            ctx.fillRect(x, y, barW, h);
            // label
            ctx.fillStyle = '#334155';
            ctx.font = '12px Tajawal';
            ctx.textAlign = 'center';
            ctx.fillText(labels[i], x + barW / 2, H - pad + 14);
            ctx.fillText(data[i], x + barW / 2, y - 6);
        }
    }

    // ---------- Mock: teacher grading -> message ----------
    document.getElementById('mock-grade').addEventListener('click', () => {
        // اختر أول واجب "مرفوع" بلا تقييم
        const a = assignmentsData.find(x => x.submitted && (x.teacher.score == null && !x.teacher.note));
        if (!a) {
            alert('لا يوجد واجب مرفوع بدون تقييم لاختباره.');
            return;
        }
        // قيّم بشكل عشوائي للاختبار
        const score = `${Math.floor(15 + Math.random() * 5)}/20`;
        const note = 'تمت المراجعة، أحسنت.';
        a.teacher = {score, note};
        save(LS.assignments, assignmentsData);
        // رسالة جديدة غير مقروءة
        const msg = {
            id: Date.now(),
            text: `📌 تم إضافة تقييم لواجب: «${a.title}» — الدرجة: ${score}.`,
            date: new Date().toISOString().slice(0, 10),
            unread: true
        };
        messagesData.unshift(msg);
        save(LS.messages, messagesData);
        renderAssignments();
        updateBadges();
        alert('تمت إضافة تقييم (محاكاة) وإرسال إشعار.');
    });

    // ---------- Init ----------
    const initial = location.hash && document.querySelector(location.hash) ? location.hash : '#overview';
    setActive(initial);
    studentSub.classList.add('show');
    toggleBtn.querySelector('.arrow').style.transform = 'rotate(180deg)';
    renderAssignments();
    renderMessages();
    updateBadges();
    window.addEventListener('popstate', () => setActive(location.hash || '#overview'));
</script>
</body>
</html>
