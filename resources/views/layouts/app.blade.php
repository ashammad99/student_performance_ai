<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('title')

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/customCss/style.css')}}">
    <style>
        :root{
            --blue-900:#0B3D91;--blue-500:#3B82F6;--gray-700:#374151;--gray-50:#F9FAFB;
            --orange-500:#F97316;--border:#E5E7EB;--radius:16px;--shadow:0 4px 20px rgba(0,0,0,.05);
        }
        *{box-sizing:border-box}
        body{margin:0;font-family:'Tajawal',sans-serif;background:var(--gray-50)}
        .app{display:grid;grid-template-columns:260px 1fr;min-height:100vh}

        /* Sidebar */
        .sidebar{background:var(--blue-900);color:#fff;padding:20px}
        .brand{font-size:22px;font-weight:800;margin-bottom:20px}
        .menu{list-style:none;padding:0;margin:0}
        .menu li{margin-bottom:6px}
        .menu a,
        .menu button.toggle{
            width:100%;display:flex;align-items:center;justify-content:space-between;
            gap:10px;background:transparent;color:#fff;text-decoration:none;border:none;
            padding:10px 12px;border-radius:10px;cursor:pointer;font-size:15px
        }
        .menu a:hover,.menu button.toggle:hover,.menu a.active{background:rgba(255,255,255,.18)}
        .arrow{transition:transform .2s ease}

        /* Submenu */
        .submenu{list-style:none;padding:6px 6px 8px 6px;margin:4px 0 8px;border-radius:10px;background:rgba(255,255,255,.08);display:none}
        .submenu.show{display:block}
        .submenu a{
            display:block;color:#e8f0ff;text-decoration:none;padding:8px 10px;border-radius:8px;font-size:14px
        }
        .submenu a:hover{background:rgba(255,255,255,.16)}

        .divider{height:1px;background:#ffffff2a;margin:12px 0}

        /* Main */
        .main{padding:25px}
        .header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px}
        .header h1{font-weight:800;color:var(--blue-900);margin:0}

        /* Cards */
        .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:15px}
        .card{background:#fff;border:1px solid var(--border);border-radius:var(--radius);padding:18px;box-shadow:var(--shadow)}
        .card h3{margin:0 0 8px;color:var(--gray-700);font-size:16px}
        .value{font-size:26px;font-weight:800;color:var(--blue-900)}
    </style>
</head>
<body>
<div class="app">
    <!-- Sidebar -->
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
                    <li><a href="{{route('admin.teachers.index')}}">• عرض المعلمين</a></li>
                    <li><a href="{{route('admin.teachers.create')}}">• إضافة معلم</a></li>
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

    <!-- Main -->
    @yield('main_content')
</div>

<script>
    // فتح/إغلاق القوائم الفرعية
    document.querySelectorAll('.toggle').forEach(btn=>{
        btn.addEventListener('click', ()=>{
            const target = document.querySelector(btn.dataset.target);
            const arrow = btn.querySelector('.arrow');
            const show = !target.classList.contains('show');
            // إغلاق بقية القوائم (اختياري)
            document.querySelectorAll('.submenu').forEach(s=>s.classList.remove('show'));
            document.querySelectorAll('.toggle .arrow').forEach(a=>a.style.transform='rotate(0deg)');
            // فتح المطلوب
            if(show){
                target.classList.add('show');
                arrow.style.transform='rotate(180deg)';
            }
        });
    });
</script>
</body>
</html>
