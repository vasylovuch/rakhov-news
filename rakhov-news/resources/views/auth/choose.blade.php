<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background: #fff;
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
            color: #2563eb;
        }

        .login-box form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .login-box input {
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 1rem;
            outline: none;
            transition: 0.2s;
        }

        .login-box input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 6px rgba(37,99,235,0.3);
        }

        .login-box button {
            background: #2563eb;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-box button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .login-box p {
            margin-top: 15px;
            font-size: 0.9rem;
        }

        .login-box a {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .login-box a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Вхід</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Електронна пошта" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Увійти</button>
        </form>
        <p>Ще немає акаунта? <a href="{{ route('register') }}">Реєстрація</a></p>
    </div>
</body>
</html>
