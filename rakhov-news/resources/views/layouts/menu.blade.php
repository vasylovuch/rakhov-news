<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Новини Рахова</title>
    <style>
        * {
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            min-height:100vh;
            display:flex;
            flex-direction:column;
            background: linear-gradient(135deg, #e0f7ff, #dbeafe, #f0f9ff);
            background-size: 400% 400%;
            animation: gradientMove 15s ease infinite;
            color:#333;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        header {
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 40px;
            height:120px;
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            color:white;
            box-shadow:0 6px 15px rgba(0,0,0,0.15);
        }

        header .title {
            text-align:center;
            flex:1;
        }

        header .title h1 {
            font-size:1.8rem;
            font-weight:700;
            margin-bottom:5px;
        }

        header .title p {
            font-size:1rem;
            font-weight:400;
            color:#e0e7ff;
        }

        nav {
            display:flex;
            gap:12px;
            align-items:center;
            height:100%;
        }

        nav a, nav button {
            display:inline-flex;
            align-items:center;
            justify-content:center;
            text-decoration:none;
            color:white;
            font-weight:600;
            padding:10px 18px;
            border-radius:8px;
            transition: all 0.25s ease;
            border:none;
            cursor:pointer;
            background:#2563eb;
        }

        nav a:hover, nav button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
            filter: brightness(1.1);
        }

        nav button {
            background:#f87171;
        }

        main {
            flex:1;
            padding:50px 20px;
            display:flex;
            flex-direction:column;
            align-items:center;
            gap:30px;
        }

        footer {
            background:#1e293b;
            color:white;
            padding:25px 40px;
            text-align:center;
            box-shadow:0 -4px 15px rgba(0,0,0,0.1);
        }

        footer a {
            color:#3b82f6;
            text-decoration:none;
            font-weight:600;
            margin:0 12px;
            transition: all 0.25s;
        }

        footer a:hover {
            color:#60a5fa;
        }

        @media(max-width:768px){
            header { flex-direction:column; height:auto; padding:20px; }
            nav { flex-wrap:wrap; justify-content:center; gap:8px; margin-top:10px; }
            main { padding:30px 15px; }
        }

        .ads-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); 
            gap: 20px;
            justify-items: center;
            width: 100%;
            margin-top: 20px;
        }

        .ad-card {
            width: 100%;
            max-width: 350px;
            text-align: center;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .ad-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .ad-card img {
            width: 100%;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 15px;
        }

        .modal {
            display: none; /* приховане спочатку */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.85);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            transition: transform 0.3s;
        }

        .modal img:hover {
            transform: scale(1.05);
        }

        .modal .close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.2s;
        }

        .modal .close:hover {
            color: #f87171;
        }

        .form-wrapper {
            width: 100%;
            max-width: 700px;
        }

        .form-card {
            background: #ffffffdd;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.25);
        }

        .form-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 25px;
            color: #1e3a8a;
        }

        .alert {
            background: #fee2e2;
            color: #b91c1c;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #1e40af;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding: 12px 15px;
            border-radius: 12px;
            border: 1px solid #cbd5e1;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 8px rgba(37, 99, 235, 0.3);
        }

        .form-row {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .form-row .form-group {
            flex: 1 1 30%;
        }

        .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.25s ease;
        border: none;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .about-container {
            display: flex;
            flex-direction: column;
            gap: 40px;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .info-block {
            background: #ffffffdd;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .info-block:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.15);
        }

        .info-block h2 {
            color: #1e40af;
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .info-block p {
            font-size: 1rem;
            color: #334155;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .info-block img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .info-block img:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 30px rgba(0,0,0,0.2);
        }

        @media (max-width:768px) {
            .about-container {
                padding: 15px;
                gap: 25px;
            }
            .info-block {
                padding: 20px;
            }
        }


        .btn-search {
            background: #2563eb;
            color: white;
        }
        .btn-search:hover {
            background: #1e40af;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        .btn-clear {
            background: #f97316;
            color: white;
        }
        .btn-clear:hover {
            background: #ea580c;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

                .cart-badge {
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
            vertical-align: top;
            margin-left: 5px;
        }


        .btn-add {
            background: #066445ff;
            color: white;
        }
        .btn-add:hover {
            background: #077955ff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        .btn i {
            margin-right: 8px;
        }

        @media(max-width:768px) {
            .form-row {
                flex-direction: column;
            }

            floating-cart {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            padding: 15px 20px;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: transform 0.2s;
        }

        .floating-cart:hover {
            transform: scale(1.05);
        }

        .floating-cart span {
            background: red;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }
    }

        
    </style>
</head>
<body>

<header>
    <div style="font-weight:600; font-size:1rem;">
        @auth
            👤 {{ auth()->user()->name ?? auth()->user()->email }}
        @else
            Гість
        @endauth
    </div>
    <div style="width:200px;"></div>
    <div class="title">
        <h1>@yield('header-title')</h1>
        <p>@yield('header-subtitle')</p>
    </div>

   <nav>
    <a href="{{ route('news.index') }}">Новини</a>
    <a href="{{ route('news.about') }}">Про нас</a>
    <a href="{{ route('sellit.index') }}">Оголошення</a>

    @auth
        <a href="{{ route('sellit.my') }}">Мої оголошення</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Вийти</button>
        </form>
    @endauth
</nav>

</header>

<main>
    @yield('content')
</main>
<a href="{{ route('cart.index') }}" class="floating-cart">
    🛒 Кошик
    @if(isset($cartCount) && $cartCount > 0)
        <span>{{ $cartCount }}</span>
    @endif
</a>
<footer>
    © 2025 Новини Рахова | 
    <a href="{{ route('news.about') }}">Про нас</a> | 
    <a href="{{ route('news.index') }}">Новини</a> | 
    <a href="{{ route('sellit.index') }}">Оголошення</a>
</footer>

</body>
</html>
