<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Оголошення — Новини Рахова</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0f2fe, #f0f9ff);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

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

        h1 {
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 15px;
            text-align: center; /* для кнопки додати оголошення */
        }

        .ads-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 20px;
            justify-content: center;
        }

        /* Картки */
        .ad-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            padding: 15px 20px;
            transition: transform 0.2s, box-shadow 0.2s;
            font-size: 0.95rem;
            min-height: 400px;
        }

        .ad-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        /* Зображення */
        .ad-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .ad-image:hover {
            transform: scale(1.03);
        }

        .add-btn {
            background: #2563eb;
            padding: 12px 20px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .add-btn:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        /* Модальне вікно */
        .modal {
    display: none; 
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.9);
    justify-content: center;
    align-items: center;
    overflow: auto;
}

.modal-content {
    max-width: 95%;
    max-height: 95%;
    margin: auto;
    display: block;
    border-radius: 10px;
    animation: zoom 0.3s ease;
}

@keyframes zoom {
    from {transform: scale(0.7);}
    to {transform: scale(1);}
}

.close {
    position: absolute;
    top: 20px;
    right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.2s;
}

.close:hover {
    color: #f97316;
}

        .price {
            font-weight: bold;
            color: #f97316;
            font-size: 1.1rem;
        }

        .btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #1d4ed8;
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
<header>
    <div style="width: 200px;"></div>
    <div class="title">
        <h1>Оголошення</h1>
        <p>Вітаємо на нашій сторінці</p>
    </div>
        <nav>
    <a href="{{ route('news.index') }}">Новини</a>
    <a href="{{ route('news.about') }}">Про нас</a>
    <a href="{{ route('sellit.index') }}">Оголошення</a>
    <a href="{{ route('create.sellit') }}">Продай</a>
</nav>

    </nav>
</header>



<div class="container">
    <!-- Кнопка додати оголошення -->
    <a href="{{ route('create.sellit') }}" class="btn add-btn" style="margin-bottom: 30px; display: inline-block;">+ Додати оголошення</a>
    <!-- Форма пошуку -->
    <form action="{{ route('sellit.index') }}" method="GET" class="search-form" style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap; justify-content: center;">
    <input type="text" name="query" value="{{ request('query') }}" placeholder="Пошук за назвою, описом..." style="padding: 10px; border-radius: 8px; border: 1px solid #ccc; min-width: 200px;">
    
    <select name="category" style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
        <option value="">Всі категорії</option>
        <option value="electronics" {{ request('category') == 'electronics' ? 'selected' : '' }}>Електроніка</option>
        <option value="clothes" {{ request('category') == 'clothes' ? 'selected' : '' }}>Одяг</option>
        <option value="vehicles" {{ request('category') == 'vehicles' ? 'selected' : '' }}>Транспорт</option>
        <option value="other" {{ request('category') == 'other' ? 'selected' : '' }}>Інше</option>
    </select>

    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Мін. ціна" style="padding: 10px; border-radius: 8px; border: 1px solid #ccc; width: 100px;">
    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Макс. ціна" style="padding: 10px; border-radius: 8px; border: 1px solid #ccc; width: 100px;">

    <input type="text" name="location" value="{{ request('location') }}" placeholder="Місто або село" style="padding: 10px; border-radius: 8px; border: 1px solid #ccc; min-width: 150px;">

    <div style="display: flex; gap: 10px; flex-wrap: wrap; justify-content: center;">
    <button type="submit" class="btn" style="flex: 1; min-width: 120px;">Пошук</button>
    <a href="{{ route('sellit.index') }}" class="btn" style="flex: 1; min-width: 120px; background:#f97316;">Зняти фільтр</a>
</div>

</form>




    <!-- Сітка оголошень -->
    <div class="ads-grid">
        @forelse($sellits as $sell)
            <div class="ad-card">
                @if($sell->image)
                    <img src="{{ asset('storage/' . $sell->image) }}" alt="{{ $sell->title }}" class="ad-image" onclick="openModal('{{ asset('storage/' . $sell->image) }}')">
                @else
                    <img src="https://via.placeholder.com/300x200?text=Немає+фото" alt="Немає фото" class="ad-image" onclick="openModal('https://via.placeholder.com/300x200?text=Немає+фото')">
                @endif

                <h3>{{ $sell->title }}</h3>
                <p>{{ $sell->description }}</p>
                <p class="price">{{ $sell->price }} грн</p>
                <p><strong>Категорія:</strong> {{ $sell->category }}</p>
                <p><strong>Телефон:</strong> {{ $sell->phone }}</p>
                <p><strong>Місце знаходження:</strong> {{ $sell->location }}</p>
            </div>
        @empty
            <p>Поки що немає жодного оголошення.</p>
        @endforelse
    </div>
</div>


<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImg">
</div>

<script>
function openModal(src) {
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImg");
    modal.style.display = "block";
    modalImg.src = src;
}

function closeModal() {
    document.getElementById("imageModal").style.display = "none";
}
</script>





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
