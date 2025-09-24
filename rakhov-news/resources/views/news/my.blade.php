@extends('layouts.menu')

@section('title', 'Мої оголошення')
@section('header-title', 'Мої оголошення')
@section('header-subtitle', 'Вітаємо на нашій сторінці')

@section('content')
<div class="container" style="display: flex; flex-direction: column; align-items: center; gap: 30px; padding: 20px;">

    <h1 style="text-align:center;">Мої оголошення</h1>

    <div class="ads-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 20px; width:100%; max-width:1000px;">
        @forelse($sellits as $sell)
            <div class="ad-card" style="background:#fff; border-radius:12px; box-shadow:0 8px 20px rgba(0,0,0,0.1); padding:20px; text-align:center;">
                @if($sell->image)
                    <img src="{{ asset('storage/' . $sell->image) }}" alt="{{ $sell->title }}" 
                         style="width:100%; border-radius:10px; cursor:pointer; margin-bottom:15px;"
                         onclick="openModal('{{ asset('storage/' . $sell->image) }}')">
                @else
                    <img src="https://via.placeholder.com/300x200?text=Немає+фото" 
                         alt="Немає фото" 
                         style="width:100%; border-radius:10px; cursor:pointer; margin-bottom:15px;"
                         onclick="openModal('https://via.placeholder.com/300x200?text=Немає+фото')">
                @endif

                <h3 style="margin-bottom:10px;">{{ $sell->title }}</h3>
                <p style="margin-bottom:10px;">{{ $sell->description }}</p>
                <p style="font-weight:bold; margin-bottom:10px;">{{ $sell->price }} грн</p>
                <p><strong>Категорія:</strong> {{ $sell->category }}</p>
                <p><strong>Телефон:</strong> {{ $sell->phone }}</p>
                <p><strong>Місце знаходження:</strong> {{ $sell->location }}</p>

                @if($sell->orders->count() > 0)
                    <p style="color:green; font-weight:bold; margin-top:10px;">🛒 Цей товар вже замовили</p>
                @endif
            </div>
        @empty
            <p>У вас ще немає жодного оголошення.</p>
        @endforelse
    </div>

    <div id="imageModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; 
                                background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:9999;">
        <span onclick="closeModal()" 
              style="position:absolute; top:20px; right:30px; color:white; font-size:40px; cursor:pointer;">&times;</span>
        <img id="modalImg" style="max-width:90%; max-height:90%; border-radius:10px;">
    </div>

    <div style="margin-top:30px;">
        <a href="{{ route('sellit.index') }}" class="btn btn-orange">⬅ Назад до всіх оголошень</a>
    </div>

</div>

<script>
function openModal(src){
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImg');
    modal.style.display = 'flex';
    modal.style.flexDirection = 'column';
    modal.style.justifyContent = 'center';
    modal.style.alignItems = 'center';
    modalImg.src = src;
}
function closeModal(){
    document.getElementById('imageModal').style.display = 'none';
}
</script>

@endsection
