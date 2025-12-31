<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رُقِي - تسجيل الدخول</title>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-main: #EBF5F8;
            --bg-gradient-start: #D8EEF4;
            --header-bg: rgba(235, 245, 248, 0.8);
            --card-start: #4DB6AC;
            --card-end: #00BCD4;
            --icon-circle-bg: #80CBC4;
            --text-dark: #263238;
            --text-light: #FFFFFF;
            --primary-blue: #2196F3;
            --primary-green: #4CAF50;
        }

        body {
            margin: 0;
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, var(--bg-main), var(--bg-gradient-start));
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: var(--text-dark);
            text-align: center;
            overflow-x: hidden;
            position: relative;
        }

        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            background: radial-gradient(circle at 50% 50%, rgba(0, 0, 0, 0.03), transparent 70%);
            animation: pulse 10s ease-in-out infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.1); opacity: 0.5; }
            100% { transform: scale(1); opacity: 0.3; }
        }

        header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            background-color: var(--header-bg);
            backdrop-filter: blur(5px);
            padding: 15px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
            z-index: 100;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .header-logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .header-logo-container:hover {
            transform: scale(1.08) translateY(-2px);
        }

        .header-logo-container img {
            width: 80px;
            height: auto;
            filter: drop-shadow(0 0 10px rgba(0,0,0,0.2));
        }

        .header-text-right {
            color: var(--text-dark);
            font-size: 38px;
            font-weight: 900;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }

        /* حاوية البحث */
        .search-container {
            display: flex;
            align-items: center;
            transition: all 0.5s ease;
        }

        .search-container svg {
            width: 24px;
            height: 24px;
            fill: var(--text-dark);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-container input {
            width: 0;
            opacity: 0;
            margin-right: 10px;
            padding: 8px 15px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 1rem;
            font-family: 'Tajawal', sans-serif;
            background-color: rgba(255, 255, 255, 0.8);
            transition: all 0.5s ease;
        }

        /* حالة التفاعل مع البحث */
        .search-container.active input {
            width: 250px;
            opacity: 1;
            padding: 8px 15px;
        }

        .hero-section {
            flex-grow: 1;
            padding-top: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .hero-section h1 {
            font-size: 4rem;
            margin-bottom: 15px;
            animation: fadeIn 1.2s forwards;
            opacity: 0;
            color: var(--text-dark);
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }

        .hero-section p {
            font-size: 1.6rem;
            max-width: 700px;
            margin: 0 auto 40px;
            color: var(--text-dark);
            animation: fadeIn 1.5s forwards;
            opacity: 0;
            animation-delay: 0.5s;
            line-height: 1.6;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        .hero-section .hero-image-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto 50px;
            position: relative;
            animation: float 4s ease-in-out infinite;
        }

        .hero-section .hero-image-container img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 0 40px rgba(0, 188, 212, 0.3);
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        .stats-section {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-bottom: 60px;
            padding: 20px;
        }

        .stat-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
            animation: fadeIn 1s forwards;
            opacity: 0;
            animation-delay: 2s;
        }

        .stat-card h2 {
            font-size: 3.5rem;
            margin: 0;
            font-weight: 800;
            color: var(--primary-blue);
        }

        .stat-card p {
            font-size: 1.2rem;
            margin: 0;
            color: var(--text-dark);
        }

        .choice-prompt {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary-green);
            margin-top: 40px;
            margin-bottom: 50px;
            position: relative;
            padding-bottom: 10px;
            animation: fadeIn 1.5s forwards;
            animation-delay: 3.5s;
            opacity: 0;
            text-shadow: 0 0 10px rgba(76,175,80,0.3);
        }

        .choice-prompt::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--primary-blue), transparent);
            border-radius: 2px;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            padding: 0 20px 50px;
        }
        .cards a{
            text-decoration: none;
        }

        .card {
            width: 280px;
            padding: 35px 25px;
            border-radius: 25px;
            background: linear-gradient(45deg, var(--card-start), var(--card-end));
            color: var(--text-light);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            cursor: pointer;
            transition: transform 0.4s, box-shadow 0.4s;
            opacity: 0;
            transform: perspective(1000px) translateY(30px);
            animation: cardAppear 0.8s forwards;
        }

        .card:nth-child(1) { animation-delay: 4s; }
        .card:nth-child(2) { animation-delay: 4.3s; }
        .card:nth-child(3) { animation-delay: 4.6s; }

        @keyframes cardAppear {
            to { opacity: 1; transform: perspective(1000px) translateY(0); }
        }

        .card:hover {
            box-shadow: 0 0 40px rgba(0, 188, 212, 0.4);
        }

        .icon-circle {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background-color: var(--primary-blue);
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 25px auto;
            transition: background 0.4s, transform 0.3s;
        }

        .card:hover .icon-circle {
            background-color: var(--text-light);
            transform: scale(1.1);
        }

        .card img {
            width: 45px;
            height: 45px;
            filter: drop-shadow(0 0 8px rgba(0,0,0,0.2));
        }

        .card h2 {
            margin: 0;
            font-size: 1.7rem;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.1);
        }

        /* الفوتر */
        footer {
            margin-top: auto;
            background-color: var(--header-bg);
            backdrop-filter: blur(5px);
            padding: 15px 0;
            color: var(--text-dark);
            font-size: 14px;
            box-shadow: 0 -4px 15px rgba(0,0,0,0.1);
        }

        @media(max-width: 768px){
            .cards { flex-direction: column; align-items: center; }
            .card { width: 85%; }
            .hero-section h1 { font-size: 2.8rem; }
            .hero-section p { font-size: 1.3rem; }
            .hero-section .hero-image-container { max-width: 90%; }
            header { padding: 15px 20px; }
            .header-text-right { font-size: 30px; }
            .header-logo-container img { width: 70px; }
            .stats-section { flex-direction: column; gap: 30px; }
            .choice-prompt { font-size: 1.8rem; }
            .search-container.active input { width: 180px; }
        }
    </style>
</head>
<body>

<div class="animated-bg"></div>

<header>
    <span class="header-text-right">رُقِي</span>

    <div class="search-container">
        <input type="text" placeholder="ابحث عن مسارك هنا...">
        <svg class="search-icon" viewBox="0 0 24 24" fill="currentColor">
            <path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
        </svg>
    </div>

    <div class="header-logo-container">
        <img src="image/logo.png" alt="شعار رُقِي">
    </div>
</header>

<div class="main-content">
    <section class="hero-section">
        <h1>مرحباً بك في رُقِي</h1>
        <p>منصتك الذكية لتحليل الأداء وتقديم مسارات تعليمية مخصصة للارتقاء بمستقبلك.</p>
        <div class="hero-image-container">
            <img src="image/tree.png" alt="شجرة المعرفة المتوهجة">
            <span style="font-size: 14px; color: #666; display: block; margin-top: 10px;">
            </span>
        </div>
    </section>

    <div class="stats-section">
        <div class="stat-card">
            <h2 class="stat-number" data-target="5000">+0</h2>
            <p>طالب من حول العالم</p>
        </div>
        <div class="stat-card">
            <h2 class="stat-number" data-target="100">+0</h2>
            <p>مسار تعليمي مخصص</p>
        </div>
        <div class="stat-card">
            <h2 class="stat-number" data-target="95">+0%</h2>
            <p>نسبة رضا المستخدمين</p>
        </div>
    </div>

    <p class="choice-prompt">لتبدأ رحلتك في شجرة المعرفة، اختر دورك:</p>

    <div class="cards">
        <a href="{{route('student.login')}}" class="a">
            <div class="card" data-tilt>
                <div class="icon-circle">
                    <img src="https://cdn-icons-png.flaticon.com/512/201/201818.png" alt="طالب">
                </div>
                <h2>الطالب</h2>
            </div>
        </a>

        <a href="{{route('teacher.login')}}" class="a">
            <div class="card" data-tilt>
                <div class="icon-circle">
                    <img src="https://cdn-icons-png.flaticon.com/512/1995/1995574.png" alt="معلم">
                </div>
                <h2>المعلم</h2>
            </div>
        </a>

        <a href="{{route('parent.login')}}" class="a">
            <div class="card" data-tilt>
                <div class="icon-circle">
                    <img src="https://cdn-icons-png.flaticon.com/512/2922/2922522.png" alt="ولي الأمر">
                </div>
                <h2>ولي الأمر</h2>
            </div>
        </a>
    </div>
</div>

<footer>
    © 2025 جميع الحقوق محفوظة في غزة، فلسطين.
</footer>

<script>
    // Parallax Tilt Effect for Cards
    document.querySelectorAll('.card').forEach(card => {
        const a = card.parentElement;
        card.addEventListener('mousemove', (e) => {
            const rect = a.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const tiltY = (x - rect.width / 2) / 20;
            const tiltX = (y - rect.height / 2) / 20;

            card.style.transform = `perspective(1000px) rotateX(${tiltX}deg) rotateY(${-tiltY}deg)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0px)`;
        });
    });

    // Animated Stats on Scroll
    const statsSection = document.querySelector('.stats-section');
    const statNumbers = document.querySelectorAll('.stat-number');
    let hasAnimated = false;

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !hasAnimated) {
                statNumbers.forEach(stat => {
                    const target = parseInt(stat.dataset.target);
                    let current = 0;
                    const increment = target / 200;
                    let isPercentage = stat.textContent.includes('%');

                    const updateStat = () => {
                        current += increment;
                        if (current < target) {
                            stat.textContent = `+${Math.ceil(current)}${isPercentage ? '%' : ''}`;
                            requestAnimationFrame(updateStat);
                        } else {
                            stat.textContent = `+${target}${isPercentage ? '%' : ''}`;
                        }
                    };
                    updateStat();
                });
                hasAnimated = true;
            }
        });
    }, { threshold: 0.5 });

    observer.observe(statsSection);

    // Interactive Search Bar
    const searchContainer = document.querySelector('.search-container');
    const searchIcon = document.querySelector('.search-icon');
    const searchInput = document.querySelector('.search-container input');

    searchIcon.addEventListener('click', () => {
        searchContainer.classList.toggle('active');
        if (searchContainer.classList.contains('active')) {
            searchInput.focus();
        } else {
            searchInput.blur();
        }
    });
</script>

</body>
</html>
