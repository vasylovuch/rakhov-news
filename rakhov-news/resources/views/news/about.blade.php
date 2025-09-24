@extends('layouts.menu')

@section('title', 'Про нас')
@section('header-title', 'Про нас')
@section('header-subtitle', 'Вітаємо на нашій сторінці')

@section('content')
<div class="about-container">
    <div class="info-block">
        <h2>Місія нашого сайту</h2>
        <p>Ми прагнемо інформувати мешканців та гостей Рахова про актуальні новини, культурні події та цікаві факти про наш край.</p>
        <img src="{{ asset('images/rakhiv4.jpg') }}" alt="Місія Рахова">
    </div>

    <div class="info-block">
        <h2>Наша команда</h2>
        <p>Редакція складається з місцевих журналістів та ентузіастів, які люблять Рахів і прагнуть показати його красу всім відвідувачам сайту.</p>
        <img src="{{ asset('images/rakhiv5.jpg') }}" alt="Команда Рахова">
    </div>

    <div class="info-block">
        <h2>Контакти</h2>
        <p>Зв'яжіться з нами для співпраці, подачі новин або пропозицій через електронну пошту: <a href="mailto:info@rakhivnews.com">info@rakhivnews.com</a></p>
        <img src="{{ asset('images/rakhiv6.jpg') }}" alt="Контакти">
    </div>
</div>
@endsection
