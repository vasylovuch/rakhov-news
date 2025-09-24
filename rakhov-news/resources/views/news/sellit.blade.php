@extends('layouts.menu')

@section('title', 'Мої оголошення')

@section('header-title', 'Мої оголошення')
@section('header-subtitle', 'Вітаємо на нашій сторінці')

@section('content')
<div class="ads-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px; justify-items: center; padding: 30px;">
    @forelse($sellits as $sell)
        <div class="ad-card" style="width: 100%; max-width: 350px; text-align: center; background: #fff; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); padding: 20px;">
            @if($sell->image)
                <img src="{{ asset('storage/' . $sell->image) }}" alt="{{ $sell->title }}" style="width:100%; border-radius:10px; cursor:pointer; margin-bottom:15px;" onclick="openModal('{{ asset('storage/' . $sell->image) }}')">
            @else
                <img src="https://via.placeholder.com/300x200?text=Немає+фото" alt="Немає фото" style="width:100%; border-radius:10px; cursor:pointer; margin-bottom:15px;" onclick="openModal('https://via.placeholder.com/300x200?text=Немає+фото')">
            @endif
            <h3 style="margin-bottom:10px;">{{ $sell->title }}</h3>
            <p>{{ $sell->description }}</p>
            <p class="price" style="font-weight:bold; margin:10px 0;">{{ $sell->price }} грн</p>
            <p><strong>Категорія:</strong> {{ $sell->category }}</p>
            <p><strong>Телефон:</strong> {{ $sell->phone }}</p>
            <p><strong>Місце знаходження:</strong> {{ $sell->location }}</p>
        </div>
    @empty
        <p style="grid-column: 1 / -1; text-align:center;">У вас ще немає жодного оголошення.</p>
    @endforelse
</div>

<!-- Модальне вікно -->
<div id="imageModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.9); justify-content:center; align-items:center; z-index:1000;">
    <span style="position:absolute; top:20px; right:30px; color:white; font-size:40px; cursor:pointer;" onclick="closeModal()">&times;</span>
    <img id="modalImg" style="max-width:90%; max-height:90%; border-radius:10px; box-shadow:0 10px 30px rgba(0,0,0,0.5);">
</div>

<script>
function openModal(src) {
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImg");
    modal.style.display = "flex";
    modal.style.flexDirection = "column";
    modal.style.alignItems = "center";
    modal.style.justifyContent = "center";
    modalImg.src = src;
}

function closeModal() {
    const modal = document.getElementById("imageModal");
    modal.style.display = "none";
}
</script>
@endsection
