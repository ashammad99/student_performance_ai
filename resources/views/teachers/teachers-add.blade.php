<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>رُقي | إضافة معلم</title>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        :root{--accent:#3B82F6;--border:#E5E7EB}
        *{box-sizing:border-box} body{margin:0;font-family:'Tajawal',sans-serif;background:#F9FAFB}
        .app{display:grid;grid-template-columns:280px 1fr;min-height:100vh}
        .sidebar{background:linear-gradient(180deg,#0B3D91,#0a3b89);color:#fff;padding:22px}
        .brand{display:flex;align-items:center;gap:12px;margin-bottom:18px}
        .brand-title{font-weight:800;font-size:22px}
        .brand-badge{position:relative;width:46px;height:46px;border-radius:14px;background:#ffffff1a;display:grid;place-items:center}
        .brand-dot{width:26px;height:26px;border-radius:50%;background:#fff}
        .brand-cap{position:absolute;top:-8px;inset-inline-end:-8px;width:22px;height:22px}
        .menu{list-style:none;margin:14px 0 0;padding:0}
        .menu li{margin-bottom:6px}
        .menu a,.toggle{width:100%;display:flex;align-items:center;gap:8px;justify-content:flex-start;color:#e9f1ff;text-decoration:none;border:none;background:transparent;padding:12px 14px;border-radius:12px;cursor:pointer;font-size:15px;transition:.2s}
        .menu a:hover,.toggle:hover,.menu a.active{background:#ffffff1a}
        .arrow{margin-inline-start:auto;transition:transform .2s}
        .submenu{display:none;list-style:none;padding:8px;margin:4px 0 10px;border-radius:12px;background:#ffffff14}
        .submenu.show{display:block}
        .submenu a{display:block;color:#e9f1ff;text-decoration:none;padding:9px 10px;border-radius:10px;font-size:14px}
        .submenu a:hover{background:#ffffff22}
        .divider{height:1px;background:#ffffff2b;margin:12px 0}

        .main{padding:26px 34px}

        .hero{display:flex;align-items:center;gap:12px;background:linear-gradient(120deg,#3B82F6,#0B3D91);color:#fff;border-radius:18px;padding:16px 18px;margin-bottom:14px}
        .section-title{display:flex;align-items:center;gap:8px;margin:0;font-size:22px}
        .section-icon{width:26px;height:26px;object-fit:contain}

        /* Form */
        .card{background:#fff;border:1px solid var(--border);border-radius:16px;padding:16px}
        .form-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:14px}
        .input{display:flex;flex-direction:column;gap:6px}
        .input label{font-size:14px;color:#334155}
        .input input,.input select,.input textarea{border:1px solid var(--border);border-radius:10px;padding:10px;background:#fff}
        .actions{display:flex;gap:10px;margin-top:8px}
        .btn{background:var(--accent);color:#fff;border:none;border-radius:10px;padding:10px 16px;font-weight:700;cursor:pointer}
        .btn.secondary{background:#64748b}
        @media(max-width:980px){.app{grid-template-columns:92px 1fr} .brand-title{display:none}}
    </style>
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <div class="brand">
            <div class="brand-badge">
                <div class="brand-dot"></div>
                <svg class="brand-cap" viewBox="0 0 64 64" fill="#fff"><path d="M4 24l28-12 28 12-28 12L4 24zm8 10v8c0 2 10 8 20 8s20-6 20-8v-8l-20 8-20-8z"/></svg>
            </div>
            <div class="brand-title">رُقي</div>
        </div>

        <ul class="menu">
            <li><a href="index.html">🏠 لوحة التحكم</a></li>

            <li>
                <button class="toggle" data-target="#t-sub"><span style="font-size:18px">👩‍🏫</span><span>المعلمون</span><span class="arrow">▾</span></button>
                <ul id="t-sub" class="submenu">
                    <li><a href="{{route('admin.teachers.index')}}">• عرض المعلمين</a></li>
                    <li><a href="{{route('admin.teachers.create')}}">• إضافة معلم</a></li>
                </ul>
            </li>

            <li>
                <button class="toggle" data-target="#s-sub">
                    <img class="section-icon" src="https://cdn-icons-png.flaticon.com/512/201/201818.png" alt="الطلاب">
                    <span>الطلاب</span><span class="arrow">▾</span>
                </button>
                <ul id="s-sub" class="submenu">
                    <li><a href="{{route('admin.students.index')}}">• عرض الطلاب</a></li>
                    <li><a href="{{route('admin.students.create')}}" class="active">• إضافة طالب</a></li>
                </ul>
            </li>

            <li>
                <button class="toggle" data-target="#p-sub"><span style="font-size:18px">👨‍👩‍👧</span><span>أولياء الأمور</span><span class="arrow">▾</span></button>
                <ul id="p-sub" class="submenu">
                    <li><a href="{{route('admin.parents.index')}}">• عرض أولياء الأمور</a></li>
                    <li><a href="{{route('admin.parents.create')}}">• إضافة وليّ أمر</a></li>
                </ul>
            </li>

            <div class="divider"></div>
            <li><a href="#">🏫 الصفوف</a></li>
            <li><a href="#">📈 التقارير</a></li>
            <li><a href="#">⚙️ الإعدادات</a></li>
        </ul>
    </aside>


  <!-- Main -->
  <main class="main">
    <div class="hero">
      <div>
        <h1 class="section-title"><span style="font-size:24px">👩‍🏫</span> إضافة معلم</h1>
        <div>أدخل بيانات المعلم واحفظ المعلومات.</div>
      </div>
    </div>

      <form action="{{ route('admin.teachers.store') }}" method="POST" class="card">
          @csrf
          <div class="input">
              <label for="user_number">رقم المستخدم (تلقائي)</label>
              <input type="text" id="user_number" name="user_number"
                     value="{{ $nextNumber }}" readonly style="background:#f3f4f6;cursor:not-allowed;">
          </div>
          <div class="form-grid">
              <div class="input">
                  <label for="name">الاسم الكامل</label>
                  <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                  @error('name') <small style="color:red">{{ $message }}</small> @enderror
              </div>

              <div class="input">
                  <label for="email">البريد الإلكتروني</label>
                  <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                  @error('email') <small style="color:red">{{ $message }}</small> @enderror
              </div>

              <div class="input">
                  <label for="phone">رقم الهاتف</label>
                  <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required>
                  @error('phone') <small style="color:red">{{ $message }}</small> @enderror
              </div>

              <div class="input">
                  <label for="specialization">التخصص</label>
                  <select id="specialization" name="specialization" required>
                      <option value="">-- اختر التخصص --</option>
                      <option value="رياضيات" {{ old('specialization')=='رياضيات' ? 'selected' : '' }}>رياضيات</option>
                      <option value="علوم" {{ old('specialization')=='علوم' ? 'selected' : '' }}>علوم</option>
                      <option value="لغة عربية" {{ old('specialization')=='لغة عربية' ? 'selected' : '' }}>لغة عربية</option>
                      <option value="لغة إنجليزية" {{ old('specialization')=='لغة إنجليزية' ? 'selected' : '' }}>لغة إنجليزية</option>
                      <option value="حاسوب" {{ old('specialization')=='حاسوب' ? 'selected' : '' }}>حاسوب</option>
                  </select>
                  @error('specialization') <small style="color:red">{{ $message }}</small> @enderror
              </div>

              <div class="input">
                  <label for="hire_date">تاريخ التعيين</label>
                  <input type="date" id="hire_date" name="hire_date" value="{{ old('hire_date') }}" required>
                  @error('hire_date') <small style="color:red">{{ $message }}</small> @enderror
              </div>
          </div>

          <div class="actions">
              <button type="submit" class="btn">حفظ المعلم</button>
          </div>
      </form>  </main>
</div>

<script>
  document.querySelectorAll('.toggle').forEach(btn=>{
    btn.addEventListener('click',()=>{
      const el=document.querySelector(btn.dataset.target);
      const arrow=btn.querySelector('.arrow');
      const open=!el.classList.contains('show');
      document.querySelectorAll('.submenu').forEach(s=>s.classList.remove('show'));
      document.querySelectorAll('.toggle .arrow').forEach(a=>a.style.transform='rotate(0deg)');
      if(open){el.classList.add('show');arrow.style.transform='rotate(180deg)';}
    });
  });
</script>
</body>
</html>
