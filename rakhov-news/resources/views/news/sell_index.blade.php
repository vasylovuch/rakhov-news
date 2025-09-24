@extends('layouts.menu')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('title', 'Оголошення')

@section('header-title', 'Оголошення')
@section('header-subtitle', 'Вітаємо на нашій сторінці')

@section('content')
<div class="container">
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

        <!-- Сортування -->
        <select name="sort" onchange="this.form.submit()" style="padding: 10px; border-radius: 8px; border: 1px solid #ccc;">
            <option value="">Сортувати</option>
            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Ціна: від дешевших до дорожчих</option>
            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Ціна: від дорожчих до дешевших</option>
            <option value="date_asc" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>Дата: від старих до нових</option>
            <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Дата: від нових до старих</option>
        </select>

        <div class="action-buttons">
            <button type="submit" class="btn btn-search">Пошук</button>
            <a href="{{ route('sellit.index') }}" class="btn btn-clear">Зняти фільтр</a>

            @auth
                <a href="{{ route('create.sellit') }}" class="btn btn-add">+ Додати оголошення</a>
            @else
                <a href="{{ route('choose') }}" class="btn btn-add">+ Додати оголошення</a>
            @endauth
        </div>
    </form>
</div>



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

<!-- Модальне вікно для збільшення фото -->
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img id="modalImg">
</div>

<script>
function openModal(src){
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImg');
    modal.style.display = 'flex';
    modal.style.flexDirection = 'column';
    modal.style.alignItems = 'center';
    modal.style.justifyContent = 'center';
    modalImg.src = src;
}
function closeModal(){
    document.getElementById('imageModal').style.display = 'none';
}
</script>

@endsection
