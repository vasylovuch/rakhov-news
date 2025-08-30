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
            background-color: #f4f6f8;
            color: #333;
            min-height: 100vh;
        }

        /* Хедер */
        header {
            width: 100%;
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            color: white;
            padding: 25px 0;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        header h1 {
            font-size: 2.5rem;
            letter-spacing: 1px;
        }

        /* Контейнер для двох колонок */
        .main-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 2cm;
            gap: 2cm;
        }

        /* Ліва колонка - новини */
        .container {
            flex: 1; /* займає приблизно 1/3 */
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 30px 40px;
            max-height: calc(100vh - 5cm);
            overflow-y: auto;
        }

        .news-item {
            background-color: #f9fafb;
            padding: 20px 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .news-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }

        .news-item h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #111827;
        }

        .news-item p {
            font-size: 1rem;
            line-height: 1.6;
            color: #4b5563;
        }

        .add-news {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #2563eb;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .add-news:hover {
            background-color: #1d4ed8;
        }

        /* Права колонка */
        .sidebar {
            flex: 2; /* займає більше простору */
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar img {
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .sidebar .info {
            background: #fff;
            padding: 20px 25px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
        }

        .sidebar .info h3 {
            margin-bottom: 10px;
            color: #2563eb;
        }

        .sidebar .info p {
            line-height: 1.6;
            color: #4b5563;
        }
    </style>
</head>
<body>
    <header>
        <h1>Новини Рахова</h1>
    </header>

    <div class="main-wrapper">
        <!-- Ліва колонка -->
        <div class="container">
            @if(count($news) > 0)
                @foreach($news as $item)
                    <div class="news-item">
                        <h2>{{ $item->title }}</h2>
                        <p>{{ $item->content }}</p>
                    </div>
                @endforeach
            @else
                <p style="text-align:center; color:#6b7280;">Новин поки що немає.</p>
            @endif

            @auth
            <div style="text-align:center;">
                <a href="{{ route('news.create') }}" class="add-news">Додати новину</a>
            </div>
        @else
            <p style="text-align:center; color:#6b7280; margin-top:20px;">
                Щоб додати новину, <a href="{{ route('login') }}">увійдіть</a> у систему.
            </p>
        @endauth

        </div>

        <!-- Права колонка -->
        <div class="sidebar">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Rakhiv_center.jpg" alt="Рахів центр">

            <div class="info">
                <h3>Про Рахів</h3>
                <p>Рахів — мальовниче місто в Закарпатській області, відоме як географічний центр Європи. 
                   Це край гір, традицій гуцулів та унікальної природи Карпат.</p>
            </div>

            <div class="info">
                <h3>Цікаві факти</h3>
                <p>✔ Найвищий районний центр України<br>
                   ✔ Центр гуцульської культури<br>
                   ✔ Популярний туристичний напрямок</p>
            </div>
        </div>
    </div>
</body>
</html>
