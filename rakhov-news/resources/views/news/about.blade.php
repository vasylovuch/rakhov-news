<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Про нас | Новини Рахова</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height: 100vh;
            color: #333;
            display: flex;
            flex-direction: column;

            /* Живий фон */
            background: linear-gradient(135deg, #a5f3fc, #38bdf8, #f0f9ff);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* HEADER */
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;          /* верх і низ 0, бо висота фіксована */
            height: 120px;             /* фіксована висота хедера */
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;         /* приховає будь-який "витікаючий" текст */
        }

        header .title {
            text-align: center;
            flex: 1;
            white-space: nowrap;      /* не переносити заголовок */
            overflow: hidden;
            text-overflow: ellipsis;  /* якщо занадто довгий, додасть "..." */
        }

        header .title h1 {
            font-size: 1.5rem;        /* можна підкоригувати під висоту */
            margin: 0;
        }

        header .title p {
            font-size: 0.9rem;
            margin: 0;
        }

        nav {
            display: flex;
            gap: 10px;
            height: 100%;             /* займатиме всю висоту хедера */
            align-items: center;      /* центрування по вертикалі */
        }

        nav a {
            /* прибрали flex: 1; */
            display: inline-flex;            /* для вертикального центровання тексту */
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 10px 15px;              /* більше горизонтальних паддингів для "ширших" кнопок */
            border-radius: 8px;
            transition: all 0.2s ease;
            white-space: nowrap;             /* текст не переноситься */
        }

        nav a:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            filter: brightness(1.1);
        }

        nav a:nth-child(3) {
            background: #1263e4ff;
        }

        nav a:not(:nth-child(3)) {
            background: #1263e4ff;
        }

        /* MAIN CONTENT */
        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
            padding: 50px 20px;
        }

        .info-block {
            background: rgba(255,255,255,0.85);
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
            backdrop-filter: blur(6px);
            text-align: center;
            max-width: 900px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-block:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 25px 60px rgba(0,0,0,0.3);
        }

        .info-block img {
            max-width: 700px;
            margin: 20px auto 0 auto;
            border-radius: 15px;
            transition: transform 0.3s ease;
        }

        .info-block img:hover {
            transform: scale(1.05) rotate(-1deg);
        }

        /* FOOTER */
        footer {
            background: #1e293b;
            color: #fff;
            padding: 20px 40px;
            text-align: center;
            box-shadow: 0 -4px 10px rgba(0,0,0,0.1);
        }

        footer a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 600;
            margin: 0 10px;
            transition: color 0.2s;
        }

        footer a:hover {
            color: #60a5fa;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<header>
    <div style="width: 200px;"></div>
    <div class="title">
        <h1>Про нас</h1>
        <p>Вітаємо на нашій сторінці</p>
    </div>
    <nav>
        <a href="{{ route('news.index') }}">Новини</a>
        <a href="{{ route('news.about') }}">Про нас</a>
        <a href="{{ route('sellit.index') }}">Оголошення</a>
        <a href="{{ route('store.sellit') }}">Продай</a>
    </nav>
</header>

<!-- MAIN CONTENT -->
<div class="content-wrapper">
    <div class="info-block">
        <h2>Місія нашого сайту</h2>
        <p>Ми прагнемо інформувати мешканців та гостей Рахова про актуальні новини, культурні події та цікаві факти про наш край.</p>
        <img src="{{ asset('images/rakhiv4.jpg') }}" alt="Місія Рахова">
    </div>

    <div class="info-block">
        <h2>Наша команда</h2>
        <p>Редакція складається з місцевих журналістів та ентузіастів, які люблять Рахів і прагнуть показати його красу всім відвідувачам сайту.</p>
        <img src="{{ asset('images/rakhiv5.jpg') }}" alt="Команда Рахова">
    </div>

    <div class="info-block">
        <h2>Контакти</h2>
        <p>Зв'яжіться з нами для співпраці, подачі новин або пропозицій через електронну пошту: info@rakhivnews.com</p>
        <img src="{{ asset('images/rakhiv6.jpg') }}" alt="Контакти">
    </div>
</div>

<!-- FOOTER -->
<footer>
    © 2025 Новини Рахова | 
    <a href="{{ route('news.about') }}">Про нас</a> | 
    <a href="{{ route('news.index') }}">Новини</a> | 
    <a href="{{ route('sellit.index') }}">Оголошення</a> |
    <a href="{{ route('create.sellit') }}">Продай</a>
</footer>

</body>
</html>
