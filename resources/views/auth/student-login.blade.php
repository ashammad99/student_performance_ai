<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>تسجيل دخول طالب</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* نظام الألوان الأنيق */
        :root {
            --bg-main: #DDEBF0;
            --bg-gradient-start: #C1DCE4;
            --header-bg: rgba(221, 235, 240, 0.85);
            --card-start: #3A9B93;
            --card-end: #0097A7;
            --icon-circle-bg: #6BA8A2;
            --text-dark: #1A2226;
            --text-light: #FFFFFF;
            --primary-blue: #1565C0;
            --primary-green: #388E3C;
            --secondary-button: #FFC107;
        }

        body {
            margin: 0;
            font-family: 'Tajawal', sans-serif;
            background-color: var(--bg-main);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: var(--text-dark);
        }

        a {
            text-decoration: none;
        }

        header {
            background-color: var(--header-bg);
            backdrop-filter: blur(5px);
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--text-dark);
            font-size: 20px;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        header img {
            width: 50px;
            height: auto;
        }

        .header-text {
            flex: 1;
            margin: 0 10px;
            color: var(--primary-green);
            font-weight: bold;
            font-size: 20px;
            text-align: center;
            transition: opacity 0.5s ease-in-out;
        }

        footer {
            margin-top: auto;
            background-color: var(--header-bg);
            backdrop-filter: blur(5px);
            padding: 15px 0;
            color: var(--text-dark);
            font-size: 14px;
            text-align: center;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.15);
        }

        .container {
            background: linear-gradient(135deg, var(--bg-main), var(--bg-gradient-start));
            max-width: 400px;
            width: 90%;
            margin: 40px auto;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15),
            0 0 40px rgba(0, 188, 212, 0.2);
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInSlideUp 0.8s forwards;
            animation-delay: 0.5s;
        }

        .top-icon {
            width: 100px;
            height: 100px;
            margin-bottom: 15px;
            animation: pulse 2s infinite ease-in-out;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            text-align: right;
        }

        label {
            margin: 8px 0 3px;
            font-weight: bold;
        }

        input, select {
            padding: 10px;
            margin-bottom: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-family: 'Tajawal', sans-serif;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 8px rgba(21, 101, 192, 0.4);
            outline: none;
        }

        button {
            padding: 12px;
            background-color: var(--primary-blue);
            color: var(--text-light);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            margin-top: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background-color: #0D47A1;
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(21, 101, 192, 0.4);
        }

        button:active {
            transform: translateY(0);
            box-shadow: 0 4px 10px rgba(21, 101, 192, 0.4);
            background-color: #0d2a66;
        }

        .signup-text {
            margin-top: 15px;
            font-size: 14px;
            color: var(--text-dark);
        }

        .signup-text a {
            color: var(--primary-blue);
            font-weight: bold;
        }

        .signup-text a:hover {
            text-decoration: underline;
        }

        /* حركات جديدة */
        @keyframes fadeInSlideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(0, 188, 212, 0.7);
            }
            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 15px rgba(0, 188, 212, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(0, 188, 212, 0);
            }
        }
    </style>
</head>
<body>

<header>
    <span>رُقي</span>
    <span id="dynamic-phrase" class="header-text"></span>
    <img src="image/logo.png" alt="شعار الموقع">
</header>

<div class="container">
    <img src="https://cdn-icons-png.flaticon.com/512/201/201818.png" alt="الطالب" class="top-icon">
    <h2>تسجيل دخول طالب</h2>
    <form method="post" action="{{route('student.login.submit')}}">
        @csrf
        <label>رقم المستخدم</label>
        <input type="text" name="user_number" required>
        @error('user_number')
        <p class="text-danger" style="color: red">{{ $message }}</p>
        @enderror
        <label>كلمة المرور</label>
        <input type="password" name="password" required>
        <button type="submit">تسجيل الدخول</button>
    </form>
</div>

<footer>© 2025 جميع الحقوق محفوظة</footer>

<script>
    const phrases = [
        "كل يوم دراسي هو فرصة جديدة لتكون أفضل",
        "خطواتك الصغيرة اليوم هي قفزاتك الكبيرة نحو المستقبل",
        "لا تخف من الفشل، بل خاف من عدم المحاولة",
        "اجعل من أحلامك خطة، ومن خطتك واقعًا",
        "أنتَ القائد الوحيد لمستقبلك، فأتقن قيادته",
        "النجاح ليس مصادفة، بل نتاج عمل دؤوب وشغف",
        "كل صفحة تقرأها، وكل معادلة تفهمها، تبني جسراً نحو أحلامك",
        "تعلم اليوم لتُغير العالم غداً",
        "المستقبل يبدأ بخطوة. وخطوتك الأولى هي الآن"
    ];

    function getRandomPhrase() {
        const randomIndex = Math.floor(Math.random() * phrases.length);
        return phrases[randomIndex];
    }

    const phraseElement = document.getElementById('dynamic-phrase');
    phraseElement.textContent = getRandomPhrase();
</script>

</body>
</html>
