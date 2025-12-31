<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تقرير تقييم الطالب</title>
    <style>
        /* عام */
        body {
            font-family: sans-serif;
            background: linear-gradient(to bottom right, #f3f4f6, #e5e7eb);
            color: #1f2937;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        /* البطاقات */
        .card {
            background: #fff;
            border-radius: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .border-top-blue {
            border-top: 6px solid #3b82f6;
        }
        .border-top-red {
            border-top: 6px solid #ff0000;
        }

        .border-top-green {
            border-top: 6px solid #10b981;
        }

        .border-top-purple {
            border-top: 6px solid #8b5cf6;
        }

        .border-right-indigo {
            border-right: 6px solid #6366f1;
        }

        .border-green {
            border: 1px solid #d1fae5;
            background: #ecfdf5;
        }

        h1 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* نصوص ملخص الأداء */
        .text-center {
            text-align: center;
        }

        .text-blue {
            color: #3b82f6;
        }

        .text-green {
            color: #10b981;
        }

        .text-purple {
            color: #8b5cf6;
        }

        .text-indigo {
            color: #6366f1;
        }

        .text-gray {
            color: #374151;
        }
        .text-red {
            color: #ff0000;
        }
        /* الشبكات */
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        /* القوائم */
        ul {
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 8px;
        }

        /* أزرار */
        .btn {
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-blue {
            background: #3b82f6;
            color: white;
            border: none;
        }

        .btn-blue:hover {
            background: #2563eb;
        }

        .btn-gray {
            background: #d1d5db;
            color: #1f2937;
            border: none;
        }

        .btn-gray:hover {
            background: #9ca3af;
        }
    </style>
</head>

<body>
<div class="container">
    <!-- عنوان التقرير -->
    <div class="card border-top-blue">
        <h1>📊 تقرير تقييم الطالب باستخدام الذكاء الاصطناعي</h1>
        <p class="text-gray">تحليل شامل لأداء الطالب استنادًا إلى بيانات الحضور، الواجبات، والاختبارات.</p>
    </div>

    <!-- بطاقة بيانات الطالب -->
    <div class="card" style="background:#eff6ff; border:1px solid #bfdbfe;">
        <h2>👦 بيانات الطالب</h2>
        <div class="grid-2">
            <p><strong>الاسم:</strong> <span class="text-gray">{{$student->name}}</span></p>
            <p><strong>الصف:</strong> <span class="text-gray">{{$student->grade}}</span></p>
            <p><strong>العمر:</strong> <span class="text-gray">{{$student->age}} سنة</span></p>
            <p><strong>المعلم:</strong> <span class="text-gray">أ.{{$student->teacher->name}}</span></p>
        </div>
    </div>

    <!-- ملخص الأداء -->
    <div class="grid-3">
        <div class="card border-top-green text-center">
            <h3>الواجبات</h3>
            <p style="font-size:36px; font-weight:800;" class="text-green">{{$averageGrade}}%</p>
        </div>
        <div class="card border-top-purple text-center">
            <h3>نسبة الحضور</h3>
            <p style="font-size:36px; font-weight:800;" class="text-purple">{{$attendance}}%</p>
        </div>
        <div class="card border-top-red text-center">
            <h3>عدد الواجبات غير مسلمة</h3>
            <p style="font-size:36px; font-weight:800;" class="text-red">{{$pendingAssignmentsCount}}</p>
        </div>
    </div>

    <!-- ملاحظات المعلم -->
    <div class="card border-right-indigo">
        <h2></h2>
        <p class="text-gray" style="line-height:1.6; font-size:18px;">
        <div class="bg-yellow-50 border border-yellow-200 rounded-3xl shadow p-8 mb-8">
            <h2 class="text-2xl font-semibold text-yellow-700 mb-4">📝 ملاحظات المعلم</h2>
            <ul class="list-disc list-inside text-gray-700 text-lg space-y-2">
                @foreach($teacherComments as $comment)
                    <li>{{ $comment }}</li>
                @endforeach
            </ul>
        </div>
        </p>
    </div>

    <!-- التوصيات -->
    <div class="card border-green">
        <h2> 🤖 تحليل الذكاء الاصطناعي وتوصيات لتحسين الأداء</h2>
        <ul>
            @foreach($aiComment as $comment)
                <li>{{$comment}}</li>

            @endforeach
        </ul>
    </div>

    <!-- أزرار التحكم -->
    <div style="display:flex; justify-content:space-between; margin-top:30px;">
        <a href="{{ url()->previous() }}" class="btn btn-gray">⬅ العودة</a>
        <button onclick="window.print()" class="btn btn-blue">🖨️ طباعة التقرير</button>
    </div>
</div>
</body>
</html>
