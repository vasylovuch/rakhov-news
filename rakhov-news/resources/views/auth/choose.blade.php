<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід або Реєстрація</title>
    <style>
        body {
            background: #f4f6f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .box {
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #2563eb;
        }

        .tabs {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .tab {
            padding: 10px 20px;
            border-radius: 8px 8px 0 0;
            background: #e5e7eb;
            font-weight: 600;
            transition: background 0.2s;
        }

        .tab.active {
            background: #2563eb;
            color: #fff;
        }

        form {
            display: none;
            flex-direction: column;
        }

        form.active {
            display: flex;
        }

        input {
            padding: 12px;
            margin-bottom: 10px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
        }

        button {
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover {
            background: #1d4ed8;
        }

        .error {
            color: #dc2626;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .success {
            color: #059669;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Авторизація / Реєстрація</h1>
        <div class="tabs">
            <div class="tab active" data-target="login-form">Увійти</div>
            <div class="tab" data-target="register-form">Зареєструватися</div>
        </div>

        <!-- Форма входу -->
        <form method="POST" action="{{ route('login') }}" id="login-form" class="active">
            @csrf
            @if($errors->login->any())
                @foreach($errors->login->all() as $error)
                    <div class="error">{{ $error }}</div>
                @endforeach
            @endif
            <input type="email" name="email" placeholder="Електронна пошта" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Увійти</button>
        </form>

        <!-- Форма реєстрації -->
        <form method="POST" action="{{ route('register') }}" id="register-form">
            @csrf
            @if($errors->register->any())
                @foreach($errors->register->all() as $error)
                    <div class="error">{{ $error }}</div>
                @endforeach
            @endif
            <input type="text" name="name" placeholder="Ім'я" required value="{{ old('name') }}">
            <input type="email" name="email" placeholder="Електронна пошта" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="password" name="password_confirmation" placeholder="Підтвердження паролю" required>
            <button type="submit">Зареєструватися</button>
        </form>
    </div>

    <script>
        const tabs = document.querySelectorAll('.tab');
        const forms = document.querySelectorAll('form');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                const target = tab.dataset.target;
                forms.forEach(f => f.id === target ? f.classList.add('active') : f.classList.remove('active'));
            });
        });
    </script>
</body>
</html>
