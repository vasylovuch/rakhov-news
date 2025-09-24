@extends('layouts.menu')

@section('title', 'Новини')

@section('header-title', 'Новини')
@section('header-subtitle', 'Вітаємо на нашій сторінці')

@section('content')

<div class="sidebar" style="display: flex; flex-direction: column; align-items: center; gap: 25px;">
    
    <div class="info" style="text-align: center; max-width: 900px; padding: 30px 35px;">
        <h3>Про Рахів</h3>
        <p>Рахів — мальовниче місто в Закарпатській області, відоме як географічний центр Європи. Це край гір, традицій гуцулів та унікальної природи Карпат.</p>
        <img src="{{ asset('images/rakhiv1.jpg') }}" alt="Рахів центр" style="max-width: 700px; margin: 0 auto; border-radius: 12px;">
    </div>

    <div class="info" style="text-align: center; max-width: 900px; padding: 30px 35px;">
        <h3>Цікаві факти</h3>
        <p>✔ Найвищий районний центр України<br>
           ✔ Центр гуцульської культури<br>
           ✔ Популярний туристичний напрямок</p>
        <img src="{{ asset('images/rakhiv2.jpg') }}" alt="Рахів центр" style="max-width: 700px; margin: 0 auto; border-radius: 12px;">
    </div>

    <div class="info" style="text-align: center; max-width: 900px; padding: 30px 35px;">
        <h3>Ще фактів</h3>
        <p>✔ Найвищий районний центр України<br>
           ✔ Центр гуцульської культури<br>
           ✔ Популярний туристичний напрямок</p>
        <img src="{{ asset('images/rakhiv3.jpg') }}" alt="Рахів центр" style="max-width: 700px; margin: 0 auto; border-radius: 12px;">
    </div>
</div>

@endsection
