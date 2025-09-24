@extends('layouts.menu')

@section('title', 'Мої замовлення')
@section('header-title', 'Мої замовлення')
@section('header-subtitle', 'Перегляд ваших замовлень')

@section('content')
<div class="container">
    @forelse($orders as $order)
        <div class="order-card">
            <h3>Замовлення #{{ $order->id }} ({{ $order->created_at->format('d.m.Y H:i') }})</h3>
            <p><strong>Ім'я:</strong> {{ $order->name }}</p>
            <p><strong>Телефон:</strong> {{ $order->phone }}</p>
            <p><strong>Адреса:</strong> {{ $order->address }}</p>
            <p><strong>Коментар:</strong> {{ $order->comment ?? 'Немає' }}</p>

            <h4>Товари:</h4>
            <div class="ads-grid">
                @php
                    $items = json_decode($order->items, true);
                @endphp
                @foreach($items as $item)
                    <div class="ad-card">
                        @if(isset($item['image']))
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="ad-image" onclick="openModal('{{ $item['image'] }}')">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=Немає+фото" alt="Немає фото" class="ad-image">
                        @endif

                        <h4>{{ $item['title'] }}</h4>
                        @if(isset($item['description']))
                            <p>{{ $item['description'] }}</p>
                        @endif
                        <p class="price">Ціна: {{ $item['price'] }} грн</p>
                        <p>Кількість: {{ $item['quantity'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <hr style="margin:40px 0;">
    @empty
        <p>Ви ще не робили жодного замовлення.</p>
    @endforelse
</div>

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
