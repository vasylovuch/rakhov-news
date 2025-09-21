<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Продати в Рахові</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }

        body {
            background: linear-gradient(135deg, #fef9f0, #f0f4f8);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #333;
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

        /* MAIN */
        .main-wrapper { display: flex; justify-content: center; align-items: flex-start; padding: 40px; gap: 30px; flex: 1; }
        .container {
            flex: 2;
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            padding: 30px 40px;
            max-width: 900px;
        }

        .sell-form { display: flex; flex-direction: column; gap: 20px; }
        .sell-form input, .sell-form textarea, .sell-form select {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }
        .sell-form button {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            background: #10b981;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .sell-form button:hover { background: #059669; }

        /* FOOTER */
        footer {
            background: #1e293b;
            color: #fff;
            padding: 20px 40px;
            text-align: center;
            box-shadow: 0 -4px 10px rgba(0,0,0,0.1);
        }
        footer a { color: #3b82f6; text-decoration: none; margin: 0 10px; font-weight: 600; transition: color 0.2s; }
        footer a:hover { color: #60a5fa; }
    </style>
</head>
<body>

<!-- HEADER -->
<header>
    <div style="width: 200px;"></div>
    <div class="title">
        <h1>Продати</h1>
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
<div class="main-wrapper">
    <div class="container">
        <h2>Додати оголошення</h2>
        <form class="sell-form" action="{{ route('store.sellit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Назва товару" required>
            <textarea name="description" placeholder="Опис товару" rows="5" required></textarea>
            <input type="number" name="price" placeholder="Ціна (грн)" required>
            <input type="file" name="image" accept="image/*">
            <select name="category" required>
                <option value="">Виберіть категорію</option>
                <option value="electronics">Електроніка</option>
                <option value="clothes">Одяг</option>
                <option value="vehicles">Транспорт</option>
                <option value="other">Інше</option>
            </select>
            <input type="text" name="phone" placeholder="Номер телефону" required>
            <input type="text" name="location" placeholder="Місце знаходження (село/місто)" required>
            <button type="submit">Опублікувати</button>
        </form>
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
