<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>رُقي | لوحة وليّ الأمر</title>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
<style>
  :root{--blue-900:#0B3D91;--blue-500:#3B82F6;--gray-50:#F9FAFB;--border:#E5E7EB;--text:#1f2937;--text-sub:#334155;--radius:18px;--shadow:0 10px 26px rgba(11,61,145,.10)}
  *{box-sizing:border-box}
  body{margin:0;font-family:'Tajawal',sans-serif;background:var(--gray-50);color:var(--text)}
  .app{display:grid;grid-template-columns:280px 1fr;min-height:100vh}

  /* Sidebar */
  .sidebar{background:linear-gradient(180deg,#0B3D91,#0a3b89);color:#fff;padding:22px}
  .brand{display:flex;align-items:center;gap:12px;margin-bottom:14px}
  .brand-title{font-weight:800;font-size:22px}
  .brand-badge{position:relative;width:46px;height:46px;border-radius:14px;background:#ffffff1a;display:grid;place-items:center}
  .brand-dot{width:26px;height:26px;border-radius:50%;background:#fff}
  .brand-cap{position:absolute;top:-8px;inset-inline-end:-8px;width:22px;height:22px}
  .menu{list-style:none;margin:8px 0 0;padding:0}
  .menu li{margin-bottom:6px}
  .menu a,.toggle{width:100%;display:flex;align-items:center;gap:10px;color:#e9f1ff;text-decoration:none;padding:12px 14px;border-radius:12px;transition:.2s;background:transparent;border:none;cursor:pointer;font:inherit}
  .menu a:hover,.toggle:hover,.menu a.active{background:#ffffff1a}
  .arrow{margin-inline-start:auto;transition:transform .2s}
  .submenu{display:none;list-style:none;margin:4px 0 10px;padding:8px;border-radius:12px;background:#ffffff14}
  .submenu.show{display:block}
  .submenu a{display:block;color:#e9f1ff;text-decoration:none;padding:9px 10px;border-radius:10px;font-size:14px}
  .submenu a:hover{background:#ffffff22}
  .divider{height:1px;background:#ffffff2b;margin:12px 0}
  .sb-badge{margin-inline-start:auto;background:#fff;color:#0B3D91;border-radius:999px;padding:2px 8px;font-weight:800;font-size:12px}
  .sb-badge.gray{background:#cbd5e1;color:#0f172a}

  /* Main */
  .main{padding:26px 34px}
  .hero{display:flex;align-items:center;gap:10px;color:var(--blue-900);padding-bottom:10px;margin-bottom:16px;border-bottom:1px solid var(--border)}
  .hero .title{margin:0;font-size:26px;font-weight:800}
  .stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px}
  .card{background:#fff;border:1px solid var(--border);border-radius:var(--radius);box-shadow:var(--shadow);padding:16px}
  .k{margin:0 0 4px;color:var(--text-sub);font-size:14px}
  .v{font-weight:800;color:var(--blue-900);font-size:26px}
  .badge{display:inline-block;background:#eef2ff;color:#1d4ed8;padding:4px 8px;border-radius:999px;font-size:12px}
  .badge.done{background:#dcfce7;color:#166534}
  .badge.late{background:#fee2e2;color:#991b1b}
  table{width:100%;border-collapse:separate;border-spacing:0 10px}
  thead th{font-size:14px;color:var(--text-sub);text-align:right;padding:8px 10px}
  tbody tr{background:#fff;border:1px solid var(--border)}
  tbody td{padding:10px;color:var(--text)}

  /* Sections */
  .section{display:none;animation:fade .15s ease}
  .section.active{display:block}
  @keyframes fade{from{opacity:0;transform:translateY(6px)}to{opacity:1;transform:translateY(0)}}

  /* Messages */
  .msg{display:flex;justify-content:space-between;align-items:center;gap:8px;background:#f8fafc;border:1px solid var(--border);padding:10px;border-radius:12px}
  .msg.unread{background:#f1f5ff;border-color:#dbeafe}
  .msg .meta{font-size:12px;color:#64748b}

  /* Attendance chart */
  #attChart{width:100%;height:260px;border:1px solid var(--border);border-radius:12px}

  /* Inputs/Buttons */
  .btn{background:var(--blue-500);border:none;color:#fff;padding:9px 12px;border-radius:12px;cursor:pointer;font-weight:700}
  .btn.secondary{background:#64748b}
  input,select,textarea{border:1px solid var(--border);border-radius:10px;padding:10px;color:var(--text);background:#fff}

  @media(max-width:980px){.app{grid-template-columns:92px 1fr}.brand-title{display:none}}
</style>
</head>
<body>
<div class="app">
  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="brand">
      <div class="brand-badge"><div class="brand-dot"></div><svg class="brand-cap" viewBox="0 0 64 64" fill="#fff" aria-hidden="true"><path d="M4 24l28-12 28 12-28 12L4 24zm8 10v8c0 2 10 8 20 8s20-6 20-8v-8l-20 8-20-8z"/></svg></div>
      <div class="brand-title">رُقي</div>
    </div>

    <ul class="menu" id="menu">
      <li><a href="#overview" class="active">🏠 الرئيسية</a></li>
      <li>
        <button class="toggle" data-target="#parent-sub">
          👨‍👩‍👧 وليّ الأمر
          <span class="sb-badge" id="sb-unread">0</span>
          <span class="arrow">▾</span>
        </button>
        <ul id="parent-sub" class="submenu show">
          <li><a href="#child">👧 بيانات الابن/الابنة</a></li>
            <li><a href="#exams">🧪 الاختبارات والتقييم</a></li>
            <li><a href="#ai-evaluation">🤖 تقييم الذكاء الاصطناعي</a></li>
            <li style="list-style: none; margin: 0; padding: 0;">
                <form action="{{ route('parent.logout') }}" method="post" style="display: inline;">
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
      <h1 class="title" id="page-title">الرئيسية</h1>

    </div>

    <!-- Overview -->
    <section id="overview" class="section active">
      <div class="stats">
          <div class="card" style="text-align:center;">
              <h3 style="margin:0;color:#0B3D91;">👨‍👩‍👧 عدد الأبناء</h3>
              <p style="font-size:28px;font-weight:700;margin:8px 0;">{{ $childrenCount }}</p>
              <small>عدد الأبناء المسجلين</small>
          </div>

          <div class="card" style="text-align:center;">
              <h3 style="margin:0;color:#0B3D91;">📅 نسبة الحضور</h3>
              <p style="font-size:28px;font-weight:700;margin:8px 0;">{{ $averageAttendance }}%</p>
              <small>متوسط نسبة حضور الأبناء</small>
          </div>

          <div class="card" style="text-align:center;">
              <h3 style="margin:0;color:#0B3D91;">📝 الواجبات المنجزة</h3>
              <p style="font-size:28px;font-weight:700;margin:8px 0;">{{ $submittedAssignments }}</p>
              <small>إجمالي الواجبات التي تم تسليمها</small>
          </div>

          <div class="card" style="text-align:center;">
              <h3 style="margin:0;color:#0B3D91;">📊 متوسط الدرجات</h3>
              <p style="font-size:28px;font-weight:700;margin:8px 0;">{{ $averageGrades }}%</p>
              <small>الأداء الأكاديمي العام</small>
          </div>

      </div>
    </section>

    <!-- Child info -->
    <section id="child" class="section">
      <div class="card">
        <h3 style="margin:0 0 10px">بيانات الطالب/ة</h3>
        <div id="child-info" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:10px">
            <div class="card">
                <table class="table" style="width:100%;border-collapse:collapse">
                    <thead style="background:#f1f5f9">
                    <tr>
                        <th>رقم المستخدم</th>
                        <th>الاسم</th>
                        <th>العمر</th>
                        <th>الصف</th>
                        <th>النوع</th>
                        <th>البريد الإلكتروني</th>
                        <th>المعلم المشرف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($children as $child)
                        <tr>
                            <td>{{ $child->user_number }}</td>
                            <td>{{ $child->name }}</td>
                            <td>{{ $child->age }}</td>
                            <td>{{ $child->grade }}</td>
                            <td>{{ $child->gender }}</td>
                            <td>{{ $child->email }}</td>
                            <td>{{ $child->teacher?->name ?? 'غير محدد' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align:center;color:#666">
                                لا يوجد أبناء مسجلين بعد.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </section>
      <!-- Exams -->
      <section id="exams" class="section">
          <div class="card">
              <h3 style="margin-top:0;color:var(--text)">الاختبارات والتقييم</h3>
              <table>
                  <thead>
                  <tr>
                      <th>اسم الابن</th>
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
                          <td>{{ $submission->student?->name ?? 'غير متوفر' }}</td>
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
{{--      Ai--}}
      <section id="ai-evaluation" class="section">
          <div class="card">
              <table class="table">
                  <thead>
                  <tr>
                      <th>رقم المستخدم</th>
                      <th>الاسم</th>
                      <th>الصف</th>
                      <th>المعلم</th>
                      <th>خيارات</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($children as $child)
                      <tr>
                          <td>{{ $child->user_number }}</td>
                          <td>{{ $child->name }}</td>
                          <td>{{ $child->grade }}</td>
                          <td>{{ $child->teacher?->name ?? 'غير محدد' }}</td>
                          <td>
                              <a href="{{ route('parent.ai.report', $child->id) }}" class="btn">
                                  عرض التقييم
                              </a>
                          </td>
                      </tr>
                  @empty
                      <tr><td colspan="5" style="text-align:center">لا يوجد أبناء مسجلين</td></tr>
                  @endforelse
                  </tbody>
              </table>
          </div>
      </section>

  </main>
</div>

<script>
/* ================== LocalStorage Keys ================== */
const LS = {
  children: 'ruqi_children_v1',                 // بيانات الابن/الابنة
  inbox:    'ruqi_student_messages_v2',         // وارد عام من المدرسة
  thread:   'ruqi_parent_teacher_thread_v1',    // محادثة وليّ الأمر ↔︎ المعلّم
  exams:    'ruqi_exams_v1',                    // (للتنبيه فقط)
  lectures: 'ruqi_lectures_v1'                  // (للتنبيه فقط)
};
const save=(k,v)=>localStorage.setItem(k, JSON.stringify(v));
const load=(k,fb)=>{ try{ return JSON.parse(localStorage.getItem(k)) ?? fb }catch{ return fb } };

/* ================== Seed Data (مثال) ================== */
const seedChildren = [
  {
    id: 11, name: "ليان أحمد", gender: "f", grade: "الثامن", class: "8-أ",
    homework: [
      { id:1, title:"واجب 3 – الكسور", subject:"رياضيات", due:"2025-10-08", submitted:true,  teacher:{score:"18/20", note:"ممتاز"} },
      { id:2, title:"تقرير المختبر",   subject:"علوم",     due:"2025-10-09", submitted:false, teacher:{score:null, note:null} },
      { id:3, title:"تعبير كتابي",    subject:"لغة عربية", due:"2025-10-11", submitted:false, teacher:{score:null, note:null} }
    ],
    attendance: [
      { date:"2025-10-01", lesson:"الأولى",  subject:"رياضيات",    status:"present" },
      { date:"2025-10-02", lesson:"الثالثة", subject:"علوم",       status:"excused" },
      { date:"2025-10-03", lesson:"الثانية", subject:"لغة عربية",  status:"present" },
      { date:"2025-10-04", lesson:"الثالثة", subject:"علوم",       status:"absent"  }
    ],
    examGrades: [
      { date:"2025-10-05", subject:"رياضيات", type:"شهري",  score:"86/100" },
      { date:"2025-10-07", subject:"علوم",   type:"قصير",   score:"18/20"  }
    ]
  }
];
const seedThread = [
  { id:1, from:'teacher', text:'مرحبًا، يُرجى متابعة واجب الكسور.', at:'2025-10-06T09:30:00Z' },
  { id:2, from:'parent',  text:'تمّ، شكرًا لك.',                     at:'2025-10-06T10:05:00Z' }
];

let children = load(LS.children, seedChildren);
let thread   = load(LS.thread, seedThread);

/* ================== Navigation ================== */
const menuLinks=document.querySelectorAll('#menu a[href^="#"]');
const sections=document.querySelectorAll('.section');
const titleEl=document.getElementById('page-title');
const parentSub=document.getElementById('parent-sub');
const toggleBtn=document.querySelector('.toggle[data-target="#parent-sub"]');
toggleBtn.addEventListener('click', ()=>{
  const open=!parentSub.classList.contains('show');
  parentSub.classList.toggle('show',open);
  toggleBtn.querySelector('.arrow').style.transform=open?'rotate(180deg)':'rotate(0deg)';
});
function setActive(hash){
  menuLinks.forEach(a=>a.classList.toggle('active',a.getAttribute('href')===hash));
  sections.forEach(sec=>sec.classList.toggle('active','#'+sec.id===hash));
  const map={'#overview':'الرئيسية','#child':'بيانات الابن/الابنة','#homework':'الواجبات','#attendance':'الحضور والغياب','#grades':'التقييمات والدرجات','#alerts':'تنبيهات قريبة','#messages':'رسائل مع المعلّم','#settings':'الإعدادات'};
  titleEl.textContent = map[hash] || 'الرئيسية';
  if(Object.keys(map).includes(hash)){ parentSub.classList.add('show'); toggleBtn.querySelector('.arrow').style.transform='rotate(180deg)'; }
  if(hash==='#child') renderChildInfo();
  if(hash==='#homework') renderHomework();
  if(hash==='#attendance'){ renderAttendanceTable(); drawMonthlyAttendanceChart(); }
  if(hash==='#grades') renderGrades();
  if(hash==='#alerts') renderAlerts();      // تنبيهات فقط
  if(hash==='#messages'){ renderThread(); renderInbox(); }
}
menuLinks.forEach(a=>a.addEventListener('click', e=>{ e.preventDefault(); const h=a.getAttribute('href'); history.pushState(null,'',h); setActive(h);} ));

/* ================== Child Select ================== */
const childSel=document.getElementById('child-select');
function fillChildSelect(){ childSel.innerHTML = children.map(c=>`<option value="${c.id}">${c.name} — ${c.grade}</option>`).join(''); }
function currentChild(){ const id=Number(childSel.value||children[0]?.id); return children.find(c=>c.id===id)||children[0]; }
childSel.addEventListener('change', ()=>{ refreshKPIs(); const hash=location.hash||'#overview'; setActive(hash); });

/* ================== Helpers ================== */
function daysLeft(dueISO){ const today=new Date(); today.setHours(0,0,0,0); const due=new Date(dueISO); due.setHours(0,0,0,0); return Math.round((due-today)/86400000); }
function statusLabel(left,submitted){ if(submitted) return {text:'تم التسليم',cls:'done'}; if(left<0) return {text:`متأخر ${Math.abs(left)} يوم`,cls:'late'}; if(left===0) return {text:'مستحق اليوم',cls:'today'}; if(left<=2) return {text:'قرب الموعد',cls:'soon'}; return {text:`متبقٍ ${left} يوم`,cls:'later'}; }
function todayISO(){ return new Date().toISOString().slice(0,10); }
function parseScore(s){ if(!s) return null; if(String(s).includes('/')){ const [a,b]=String(s).split('/').map(Number); if(!isNaN(a)&&!isNaN(b)&&b>0) return Math.round(a/b*100); } const n=Number(s); return isNaN(n)?null:n; }

/* ================== KPIs ================== */
function refreshKPIs(){
  const kid=currentChild();
  const due=kid.homework.filter(h=>!h.submitted).length; document.getElementById('k-due').textContent=due;
  // attendance month %
  const ym = new Date().toISOString().slice(0,7);
  const rows = kid.attendance.filter(a=>a.date?.startsWith(ym));
  const present = rows.filter(a=>a.status==='present').length;
  const attPerc = rows.length? Math.round(present*100/rows.length):0;
  document.getElementById('k-att').textContent = attPerc+'%';
  // avg of latest evaluations
  const hwPerc = kid.homework.map(h=>parseScore(h.teacher?.score)).filter(v=>v!=null);
  const exPerc = (kid.examGrades||[]).map(e=>parseScore(e.score)).filter(v=>v!=null);
  const all = [...hwPerc, ...exPerc];
  document.getElementById('k-avg').textContent = all.length? Math.round(all.reduce((a,b)=>a+b,0)/all.length):'—';
  // unread school inbox
  const inbox = load(LS.inbox, []);
  const unread = inbox.filter(m=>m.unread).length;
  document.getElementById('k-unread').textContent = unread;
  document.getElementById('sb-unread').textContent = unread;
}

/* ================== Child Info ================== */
function renderChildInfo(){
  const kid=currentChild();
  const wrap=document.getElementById('child-info');
  wrap.innerHTML = `
    <div><div class="k">الاسم</div><div class="v" style="font-size:20px">${kid.name}</div></div>
    <div><div class="k">الصف</div><div class="v" style="font-size:20px">${kid.grade}</div></div>
    <div><div class="k">الشعبة</div><div class="v" style="font-size:20px">${kid.class}</div></div>
    <div><div class="k">واجبات غير مسلّمة</div><div class="v" style="font-size:20px">${kid.homework.filter(h=>!h.submitted).length}</div></div>
  `;
}

/* ================== Homework ================== */
function renderHomework(){
  const kid=currentChild(); const tb=document.getElementById('hw-body'); tb.innerHTML='';
  kid.homework.forEach((h,i)=>{
    const left=daysLeft(h.due), lab=statusLabel(left,h.submitted), dueHuman=new Date(h.due).toLocaleDateString('ar-EG');
    const tch = (h.teacher?.score!=null || h.teacher?.note) ? `<span class="badge done">${h.teacher.score??''} ${h.teacher.note?('— '+h.teacher.note):''}</span>` : '—';
    const tr=document.createElement('tr');
    tr.innerHTML=`<td>${i+1}</td><td>${h.title}</td><td>${h.subject}</td><td>${dueHuman}</td><td><span class="badge ${lab.cls}">${lab.text}</span></td><td>${tch}</td>`;
    tb.appendChild(tr);
  });
  if(!tb.children.length){ const tr=document.createElement('tr'); tr.innerHTML='<td colspan="6" style="text-align:center;color:#64748b">لا توجد واجبات.</td>'; tb.appendChild(tr); }
}

/* ================== Attendance: table + monthly chart ================== */
document.getElementById('att-month').addEventListener('change', ()=>{ renderAttendanceTable(); drawMonthlyAttendanceChart(); });

function renderAttendanceTable(){
  const kid=currentChild(); const tb=document.getElementById('att-body'); tb.innerHTML='';
  const view=document.getElementById('att-month').value;
  const ym=new Date().toISOString().slice(0,7);
  const rows = view==='this' ? kid.attendance.filter(a=>a.date?.startsWith(ym)) : kid.attendance.slice();
  rows.forEach(r=>{
    const state = r.status==='present' ? 'حضور' : (r.status==='excused' ? 'غياب مبرر' : 'غياب');
    const tr=document.createElement('tr');
    tr.innerHTML=`<td>${new Date(r.date).toLocaleDateString('ar-EG')}</td><td>${r.lesson||'—'}</td><td>${r.subject||'—'}</td><td><span class="badge">${state}</span></td>`;
    tb.appendChild(tr);
  });
  if(!tb.children.length){ const tr=document.createElement('tr'); tr.innerHTML='<td colspan="4" style="text-align:center;color:#64748b">لا توجد سجلات.</td>'; tb.appendChild(tr); }
}

function drawMonthlyAttendanceChart(){
  const cvs=document.getElementById('attChart'), ctx=cvs.getContext('2d');
  const W=cvs.clientWidth, H=cvs.clientHeight; const dpr=window.devicePixelRatio||1; cvs.width=W*dpr; cvs.height=H*dpr; ctx.scale(dpr,dpr);
  ctx.clearRect(0,0,W,H);

  const kid=currentChild(); const ym=new Date().toISOString().slice(0,7);
  const rows=kid.attendance.filter(a=>a.date?.startsWith(ym));
  const daysInMonth = new Date(Number(ym.slice(0,4)), Number(ym.slice(5))+0, 0).getDate();
  const dayVal = Array.from({length:daysInMonth}, (_,i)=>{
    const d = `${ym}-${String(i+1).padStart(2,'0')}`;
    const rec = rows.find(r=>r.date===d);
    if(!rec) return null;
    return rec.status==='present'?1:(rec.status==='excused'?0.5:0);
  });

  const pad=32; ctx.strokeStyle='#e5e7eb'; ctx.lineWidth=1;
  ctx.beginPath(); ctx.moveTo(pad,H-pad); ctx.lineTo(W-pad,H-pad); ctx.moveTo(pad,pad); ctx.lineTo(pad,H-pad); ctx.stroke();
  const gap=4; const barW = (W - pad*2 - gap*(daysInMonth-1)) / daysInMonth;
  for(let i=0;i<daysInMonth;i++){
    const v = dayVal[i]; const x = pad + i*(barW+gap);
    const h = v==null ? 2 : Math.max(2, Math.round((H - pad*2) * v));
    const y = H - pad - h;
    ctx.fillStyle = v==null ? '#cbd5e1' : (v===1? '#10b981' : (v===0.5? '#f59e0b' : '#ef4444'));
    ctx.fillRect(x,y,barW,h);
  }
  ctx.font='12px Tajawal'; ctx.fillStyle='#334155';
  ctx.fillText('حضور', pad, pad-10); ctx.fillStyle='#10b981'; ctx.fillRect(pad+40, pad-18, 12,12);
  ctx.fillStyle='#334155'; ctx.fillText('مبرر', pad+70, pad-10); ctx.fillStyle='#f59e0b'; ctx.fillRect(pad+110, pad-18, 12,12);
  ctx.fillStyle='#334155'; ctx.fillText('غياب', pad+150, pad-10); ctx.fillStyle='#ef4444'; ctx.fillRect(pad+190, pad-18, 12,12);
}

/* ================== Grades / Evaluations ================== */
function renderGrades(){
  const kid=currentChild(); const tb=document.getElementById('gd-body'); tb.innerHTML='';
  const rows=[];
  kid.homework.forEach(h=>{
    if(h.teacher?.score || h.teacher?.note){
      rows.push({date:h.due, label:`واجب: ${h.title} (${h.subject})`, type:'واجب', val:`${h.teacher.score||''} ${h.teacher.note?('— '+h.teacher.note):''}`});
    }
  });
  (kid.examGrades||[]).forEach(e=>{
    rows.push({date:e.date, label:e.subject, type:`امتحان ${e.type||''}`, val:e.score||'—'});
  });
  rows.sort((a,b)=> (a.date||'').localeCompare(b.date||''));
  rows.forEach(r=>{
    const tr=document.createElement('tr');
    tr.innerHTML=`<td>${new Date(r.date).toLocaleDateString('ar-EG')}</td><td>${r.label}</td><td>${r.type}</td><td>${r.val}</td>`;
    tb.appendChild(tr);
  });
  if(!tb.children.length){ const tr=document.createElement('tr'); tr.innerHTML='<td colspan="4" style="text-align:center;color:#64748b">لا توجد تقييمات بعد.</td>'; tb.appendChild(tr); }
}

/* ================== Alerts (NO links/details here) ================== */
function renderAlerts(){
  const list=document.getElementById('alerts-list'); list.innerHTML='';
  // نقرأ من لوحتي المعلّم فقط لبناء تنبيه بسيط (بدون روابط)
  const ex = load(LS.exams, []).filter(e=>e.date && new Date(e.date) >= new Date(new Date().toDateString()))
                               .sort((a,b)=>a.date.localeCompare(b.date)).slice(0,3);
  const lec = load(LS.lectures, []).slice(0,3); // لا نعرض تفاصيل، فقط تذكير عام
  if(ex.length===0 && lec.length===0){
    list.innerHTML = '<div style="color:#64748b">لا توجد تنبيهات حالية. للتفاصيل ادخل عبر صفحة ابنك.</div>';
    return;
  }
  ex.forEach(e=>{
    const li=document.createElement('li');
    li.className='msg';
    li.innerHTML = `<div>🧪 امتحان قريب: <b>${e.subject||'—'}</b> (${e.type||'—'}) — ${e.date}${e.time?('، '+e.time):''}<div class="meta">للتفاصيل الرجاء الدخول عبر صفحة الطالب</div></div>`;
    list.appendChild(li);
  });
  lec.forEach(l=>{
    const li=document.createElement('li');
    li.className='msg';
    li.innerHTML = `<div>🎓 محاضرة: <b>${l.subject||'—'}</b> — ${l.day||''} ${l.time?('، '+l.time):''}<div class="meta">للتفاصيل الرجاء الدخول عبر صفحة الطالب</div></div>`;
    list.appendChild(li);
  });
}

/* ================== Messages ================== */
function renderThread(){
  const wrap=document.getElementById('thread'); wrap.innerHTML='';
  thread.sort((a,b)=> new Date(a.at)-new Date(b.at));
  thread.forEach(m=>{
    const row=document.createElement('div');
    row.className='msg';
    row.style.justifyContent = m.from==='parent' ? 'flex-end' : 'flex-start';
    row.innerHTML = m.from==='parent'
      ? `<div style="margin-inline-start:auto;background:#e0f2fe;border:1px solid #bae6fd;padding:10px;border-radius:12px;max-width:70%">${m.text}<div class="meta">${new Date(m.at).toLocaleString('ar-EG')}</div></div>`
      : `<div style="background:#f8fafc;border:1px solid var(--border);padding:10px;border-radius:12px;max-width:70%"><b>المعلّم:</b> ${m.text}<div class="meta">${new Date(m.at).toLocaleString('ar-EG')}</div></div>`;
    wrap.appendChild(row);
  });
  if(!wrap.children.length){ wrap.innerHTML='<div style="color:#64748b">ابدأ المراسلة مع المعلّم من الأسفل.</div>'; }
}
document.getElementById('msg-send').addEventListener('click', ()=>{
  const inp=document.getElementById('msg-text'); const txt=inp.value.trim(); if(!txt) return;
  const msg={id:Date.now(), from:'parent', text:txt, at:new Date().toISOString()};
  thread.push(msg); save(LS.thread, thread); inp.value=''; renderThread();
});

function renderInbox(){
  const inbox = load(LS.inbox, []);
  const box=document.getElementById('msgs-in'); box.innerHTML='';
  inbox.sort((a,b)=> new Date(b.date)-new Date(a.date)).forEach(m=>{
    const div=document.createElement('div');
    div.className='msg'+(m.unread?' unread':'');
    div.innerHTML = `<div>${m.text}<div class="meta">${new Date(m.date).toLocaleDateString('ar-EG')}</div></div>
                     <div>${m.unread?'<button class="btn secondary" data-read="'+m.id+'">تمت قراءته</button>':''}</div>`;
    box.appendChild(div);
  });
  box.querySelectorAll('[data-read]').forEach(b=>{
    b.addEventListener('click', ()=>{
      const id=Number(b.getAttribute('data-read'));
      const msgs=load(LS.inbox, []);
      const m=msgs.find(x=>x.id===id); if(m){m.unread=false; save(LS.inbox, msgs); renderInbox(); refreshKPIs();}
    });
  });
}

/* ================== Settings (seed/reset) ================== */
document.getElementById('seed').addEventListener('click', ()=>{
  children = JSON.parse(JSON.stringify(seedChildren));
  thread   = JSON.parse(JSON.stringify(seedThread));
  save(LS.children, children); save(LS.thread, thread);
  fillChildSelect(); childSel.value=children[0].id; renderAll(); alert('تم تهيئة بيانات تجريبية.');
});
document.getElementById('reset').addEventListener('click', ()=>{
  localStorage.removeItem(LS.children); localStorage.removeItem(LS.thread);
  children = JSON.parse(JSON.stringify(seedChildren)); thread = [];
  save(LS.children, children); save(LS.thread, thread);
  fillChildSelect(); childSel.value=children[0].id; renderAll(); alert('تم مسح/إعادة ضبط البيانات التجريبية.');
});

/* ================== Init & Render ================== */
function renderAll(){
  const initial = location.hash && document.querySelector(location.hash) ? location.hash : '#overview';
  setActive(initial);
  parentSub.classList.add('show'); toggleBtn.querySelector('.arrow').style.transform='rotate(180deg)';
  renderChildInfo(); renderHomework(); renderAttendanceTable(); drawMonthlyAttendanceChart(); renderGrades(); renderAlerts(); renderThread(); renderInbox(); refreshKPIs();
}
function init(){
  if(!children.length){ children = JSON.parse(JSON.stringify(seedChildren)); save(LS.children, children); }
  fillChildSelect(); if(children[0]) childSel.value=children[0].id;
  renderAll();
  window.addEventListener('popstate', ()=>setActive(location.hash||'#overview'));
}
init();
</script>
</body>
</html>
