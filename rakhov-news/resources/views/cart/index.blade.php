@extends('layouts.menu')

@section('title', 'Кошик')
@section('header-title', 'Ваш кошик')

@if(session('success'))
    <div style="background: #d4edda; padding: 10px; border-radius: 5px; color: #155724; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

@if(session('order_success'))
    <div style="background: #cce5ff; padding: 10px; border-radius: 5px; color: #004085; margin-bottom: 15px;">
        {{ session('order_success') }}
    </div>
@endif

@section('content')
<div class="container">
    <h2>Ваш кошик</h2>

    @if(session('success'))
    <div style="background: #d4edda; padding: 10px; border-radius: 5px; color: #155724; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
    @endif

    @if($cart && count($cart) > 0)
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <th>Зображення</th>
                <th>Назва</th>
                <th>Ціна</th>
                <th>Кількість</th>
                <th>Дії</th>
            </tr>
            @foreach($cart as $id => $item)
                <tr>
                    <td><img src="{{ $item['image'] }}" width="80"></td>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['price'] }} грн</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>
                        <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color:red;">Видалити</button>
                        </form>

                        <form action="{{ route('order.create', $id) }}" method="GET" style="display:inline-block;">
                            <button type="submit" style="color:green;">Оформити замовлення</button>
                        </form>

                    </td>

                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Ваш кошик порожній 🛒</p>
    @endif
</div>
@endsection
