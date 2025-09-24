@extends('layouts.menu')

@section('header-title', 'Додати оголошення')
@section('header-subtitle', 'Заповніть форму для створення нового оголошення')

@section('content')
<div class="form-wrapper">
    <div class="form-card">
        <h2 class="form-title">Створити нове оголошення</h2>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>❌ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sellit.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Назва</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Опис</label>
                <textarea name="description" id="description" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="price">Ціна (грн)</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" required>
                </div>

                <div class="form-group">
                    <label for="category">Категорія</label>
                    <select name="category" id="category">
                        <option value="" disabled selected>Виберіть категорію</option>
                        <option value="Транспорт" {{ old('category') == 'Транспорт' ? 'selected' : '' }}>Транспорт</option>
                        <option value="Електроніка" {{ old('category') == 'Електроніка' ? 'selected' : '' }}>Електроніка</option>
                        <option value="Нерухомість" {{ old('category') == 'Нерухомість' ? 'selected' : '' }}>Нерухомість</option>
                        <option value="Робота" {{ old('category') == 'Робота' ? 'selected' : '' }}>Робота</option>
                        <option value="Послуги" {{ old('category') == 'Послуги' ? 'selected' : '' }}>Послуги</option>
                        <option value="Інше" {{ old('category') == 'Інше' ? 'selected' : '' }}>Інше</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
                </div>
            </div>

            <div class="form-group">
                <label for="location">Місцезнаходження</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}">
            </div>

            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <div class="form-group">
                <label for="image">Фото</label>
                <input type="file" name="image" id="image">
            </div>

            <button type="submit" class="btn-submit">Додати оголошення</button>
        </form>
    </div>
</div>
@endsection
