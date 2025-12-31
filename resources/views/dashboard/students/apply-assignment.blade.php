<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>رفع الواجب</title>
    <style>
        :root {
            --card-bg: #fff;
            --accent: #0b76ef
        }

        body {
            font-family: Segoe UI, Tahoma, Arial;
            background: #f3f5f7;
            color: #222;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 720px;
            margin: 24px auto
        }

        .card {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 6px 18px rgba(20, 30, 40, .06)
        }

        h1 {
            margin: 0 0 12px;
            font-size: 20px
        }

        .meta {
            color: #555;
            margin-bottom: 10px
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: 600
        }

        input[type=text], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px
        }

        textarea {
            min-height: 120px;
            resize: vertical
        }

        .row {
            display: flex;
            gap: 12px
        }

        .row .col {
            flex: 1
        }

        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 14px
        }

        button {
            background: var(--accent);
            color: #fff;
            padding: 10px 14px;
            border-radius: 8px;
            border: 0;
            cursor: pointer
        }

        .btn-secondary {
            background: #6c757d
        }

        .note {
            font-size: 13px;
            color: #666;
            margin-top: 8px
        }

        .file-info {
            margin-top: 8px;
            font-size: 13px
        }

        .error {
            color: #b00020;
            margin-top: 8px
        }

        .success {
            color: green;
            margin-top: 8px
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 for="student_name">اسم الطالب:{{Auth::guard('student')->user()->name}}</h1>

        <h1 id="assignment-title">{{$assignment->title}}</h1>
        <div class="meta" id="assignment-desc">{{$assignment->description}}</div>


        <form id="uploadForm" action="{{route('student.assignments.submit',$assignment->id)}}" method="post">
            @csrf

            <label for="notes"> اجابة الطالب</label>
            <textarea id="notes" name="answer" placeholder="اجابة الطالب"></textarea>
            <div class="actions">
                <button type="submit">ارفع الواجب</button>
                <button type="button" class="btn-secondary" id="resetBtn">إعادة تعيين</button>
            </div>
        </form>
    </div>
</div>

<script>
    // --- بيانات واجهة: يمكن استبدال هذه القيم ديناميكياً من السيرفر (Blade, PHP, Node,..) ---
    const serverAssignment = {
        title: {{$assignment->title}},
        description: {{$assignment->description}},
    };

    // عرض بيانات الواجب
    document.getElementById('assignment-title').textContent = serverAssignment.title;
    document.getElementById('assignment-desc').textContent = serverAssignment.description;

    // عناصر النموذج
    const uploadForm = document.getElementById('uploadForm');
    const fileInput = document.getElementById('file');
    const fileInfo = document.getElementById('fileInfo');
    const errorMsg = document.getElementById('errorMsg');
    const successMsg = document.getElementById('successMsg');
    const resetBtn = document.getElementById('resetBtn');

    const MAX_SIZE = 20 * 1024 * 1024; // 20MB
    const ALLOWED = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip', 'application/x-rar-compressed'];

    fileInput.addEventListener('change', () => {
        errorMsg.style.display = 'none';
        successMsg.style.display = 'none';
        const f = fileInput.files[0];
        if (!f) {
            fileInfo.textContent = '';
            return;
        }
        // validate size
        if (f.size > MAX_SIZE) {
            errorMsg.style.display = 'block';
            errorMsg.textContent = 'حجم الملف كبير جداً — الحد الأقصى 20MB.';
            fileInput.value = '';
            fileInfo.textContent = '';
            return;
        }
        // validate type (نوع الملف)
        if (!ALLOWED.includes(f.type)) {
            // بعض الملفات قد لا تعطي type صحيح (مثلاً rar) — تحقق من الامتداد كاحتياط
            const name = f.name.toLowerCase();
            if (!name.endsWith('.pdf') && !name.endsWith('.doc') && !name.endsWith('.docx') && !name.endsWith('.zip') && !name.endsWith('.rar')) {
                errorMsg.style.display = 'block';
                errorMsg.textContent = 'نوع الملف غير مسموح. مسموح: PDF, DOC, DOCX, ZIP, RAR.';
                fileInput.value = '';
                fileInfo.textContent = '';
                return;
            }
        }
        fileInfo.textContent = `المحدد: ${f.name} — ${(f.size / 1024 / 1024).toFixed(2)} MB`;
    });

    resetBtn.addEventListener('click', () => {
        uploadForm.reset();
        fileInfo.textContent = '';
        errorMsg.style.display = 'none';
        successMsg.style.display = 'none';
    });

    // إرسال عبر Fetch (AJAX) مع عرض نتيجة — يمكن تعطيله إذا تريد إرسال عادي للسيرفر
    uploadForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        errorMsg.style.display = 'none';
        successMsg.style.display = 'none';

        const f = fileInput.files[0];
        if (!f) {
            errorMsg.style.display = 'block';
            errorMsg.textContent = 'اختر ملفاً لرفعه.';
            return;
        }

        const formData = new FormData(uploadForm);
        // أضف معرف الواجب إن لزم: formData.append('assignment_id', '123');

        try {
            const resp = await fetch(uploadForm.action, {
                method: 'POST', body: formData,
                // إذا تستخدم Laravel وتحتاج لـ CSRF: أضف هيدر: 'X-CSRF-TOKEN': token
            });

            if (!resp.ok) {
                const txt = await resp.text();
                throw new Error(txt || 'فشل الرفع');
            }

            const json = await resp.json();
            successMsg.style.display = 'block';
            successMsg.textContent = json.message || 'تم رفع الملف بنجاح.';
            uploadForm.reset();
            fileInfo.textContent = '';
        } catch (err) {
            errorMsg.style.display = 'block';
            // إذا الرد نصي طويل، اقتصد في العرض
            errorMsg.textContent = err.message || 'حدث خطأ أثناء الرفع.';
        }
    });
</script>
</body>
</html>
