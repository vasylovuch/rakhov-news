@extends('layouts.menu')

@section('title', 'Оформлення замовлення')
@section('header-title', 'Оформлення замовлення')

@section('content')
<div class="container">
    <h2>Оформлення замовлення: {{ $item['title'] }}</h2>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $id }}">

        <div>
            <label>Ім'я:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Телефон:</label>
            <input type="text" name="phone" required>
        </div>

        <div>
            <label>Адреса доставки:</label>
            <input type="text" name="address" required>
        </div>

        <div>
            <label>Коментар:</label>
            <textarea name="comment"></textarea>
        </div>

        <button type="submit" style="color:green;">Підтвердити замовлення</button>
    </form>

</div>
@endsection
