<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-box {
            background: #fff;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .register-box h2 {
            margin-bottom: 20px;
            color: #16a34a;
        }

        .register-box form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .register-box input {
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 1rem;
            outline: none;
            transition: 0.2s;
        }

        .register-box input:focus {
            border-color: #16a34a;
            box-shadow: 0 0 6px rgba(22,163,74,0.3);
        }

        .register-box button {
            background: #16a34a;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.2s;
        }

        .register-box button:hover {
            background: #15803d;
            transform: translateY(-2px);
        }

        .register-box p {
            margin-top: 15px;
            font-size: 0.9rem;
        }

        .register-box a {
            color: #16a34a;
            text-decoration: none;
            font-weight: bold;
        }

        .register-box a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Реєстрація</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="email" name="email" placeholder="Електронна пошта" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <input type="password" name="password_confirmation" placeholder="Підтвердження паролю" required>
            <button type="submit">Зареєструватися</button>
        </form>
        <p>Вже є акаунт? <a href="{{ route('login') }}">Увійти</a></p>
    </div>
</body>
</html>
