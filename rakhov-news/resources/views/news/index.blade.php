<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Новини Рахова</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
        background: linear-gradient(135deg, #e0f2fe, #f0f9ff);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        min-height: 100vh;
        color: #333;
        display: flex;
        flex-direction: column;
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



        /* MAIN WRAPPER */
        .main-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 40px;
            gap: 30px;
            flex: 1;
        }

        .container {
            flex: 2;
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            padding: 30px 40px;
            max-height: calc(100vh - 160px);
            overflow-y: auto;
        }

        .news-item {
        background: #ffffffcc;
        padding: 25px;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        backdrop-filter: blur(2px);
    }

        .news-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .news-item h2 {
            font-size: 1.6rem;
            margin-bottom: 10px;
            color: #111827;
        }

        .news-item p {
            font-size: 1rem;
            line-height: 1.7;
            color: #4b5563;
        }

        /* SIDEBAR */
        .sidebar img {
        width: 100%;
        max-width: 980px; /* зменшили ширину фото */
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        margin-bottom: 15px;
    }


        .sidebar .info {
        background: #ffffffcc; /* трохи прозорий білий для ефекту “плаваючого блоку” */
        padding: 20px 25px;
        border-radius: 12px;
        box-shadow: 0 80px 200px rgba(0,0,0,0.1);
        backdrop-filter: blur(4px);
    }

        .sidebar .info h3 {
            margin-bottom: 10px;
            color: #2563eb;
        }

        .sidebar .info p {
            line-height: 1.6;
            color: #4b5563;
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

        /* Модальне вікно */
        #authModal {
            display: none; 
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000; 
        }

        #authModal .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            width: 300px;
        }

        #authModal button.close-btn {
            margin-top: 15px;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            background: #6b7280;
            color: #fff;
            cursor: pointer;
        }

        #authModal button.close-btn:hover {
            background: #4b5563;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<header>
    <div style="width: 200px;"></div> <!-- пусто для центрованого заголовка -->

    <div class="title">
        <h1>Новини Рахова</h1>
        <p>Вітаємо на нашій сторінці</p>
    </div>

    <nav>
        <a href="{{ route('news.index') }}">Новини</a>
        <a href="{{ route('news.about') }}">Про нас</a>
        <a href="{{ route('sellit.index') }}">Оголошення</a>
        <a href="{{ route('store.sellit') }}">Продай</a>
    </nav>
</header>

<!-- SIDEBAR -->
<!-- SIDEBAR -->
<div class="sidebar" style="display: flex; flex-direction: column; align-items: center; gap: 25px;">
    
    <div class="info" style="text-align: center; max-width: 900px; padding: 30px 35px;">
        <h3>Про Рахів</h3>
        <p>Рахів — мальовниче місто в Закарпатській області, відоме як географічний центр Європи. Це край гір, традицій гуцулів та унікальної природи Карпат.</p>
        <img src="{{ asset('images/rakhiv1.jpg') }}" alt="Рахів центр" style="max-width: 700px; margin: 0 auto; border-radius: 12px;">
    </div>

    <div class="info" style="text-align: center; max-width: 900px; padding: 30px 35px;">
        <h3>Цікаві факти</h3>
        <p>✔ Найвищий районний центр України<br>
           ✔ Центр гуцульської культури<br>
           ✔ Популярний туристичний напрямок</p>
        <img src="{{ asset('images/rakhiv2.jpg') }}" alt="Рахів центр" style="max-width: 700px; margin: 0 auto; border-radius: 12px;">
    </div>

    <div class="info" style="text-align: center; max-width: 900px; padding: 30px 35px;">
        <h3>Ще фактів</h3>
        <p>✔ Найвищий районний центр України<br>
           ✔ Центр гуцульської культури<br>
           ✔ Популярний туристичний напрямок</p>
        <img src="{{ asset('images/rakhiv3.jpg') }}" alt="Рахів центр" style="max-width: 700px; margin: 0 auto; border-radius: 12px;">
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
