@extends('layouts.menu')

@section('title', 'Замовлення #' . $order->id)
@section('header-title', 'Деталі замовлення')
@section('header-subtitle', 'Перегляд вашого замовлення')

@section('content')
<div class="container">
    <h2>Замовлення #{{ $order->id }}</h2>
    <p><strong>Ім'я:</strong> {{ $order->name }}</p>
    <p><strong>Телефон:</strong> {{ $order->phone }}</p>
    <p><strong>Адреса:</strong> {{ $order->address }}</p>
    <p><strong>Коментар:</strong> {{ $order->comment ?? 'Немає' }}</p>

    <h3>Товари у замовленні:</h3>
    <div class="ads-grid">
        @foreach($items as $item)
            <div class="ad-card">
                @if(isset($item['image']))
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="ad-image">
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
@endsection
