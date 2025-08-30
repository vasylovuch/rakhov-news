<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Додати новину - Рахів</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f8;
            color: #333;
            min-height: 100vh;
            padding: 0;
        }

        
        header {
            width: 100%;
            background: linear-gradient(90deg, #2563eb, #3b82f6);
            color: white;
            padding: 25px 0;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        header h1 {
            font-size: 2.5rem;
            letter-spacing: 1px;
        }

        
        .container {
            width: calc(100% - 2cm);
            min-height: calc(100vh - 2cm);
            margin: 1cm;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            padding: 40px;
            display: flex;
            flex-direction: column;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }

        input[type="text"], textarea {
            padding: 12px;
            font-size: 1rem;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            width: 100%;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        button, .back-button {
            padding: 12px 25px;
            width: 150px;       
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            text-align: center; 
        }

        button {
            background-color: #2563eb;
            color: #fff;
        }

        button:hover {
            background-color: #1d4ed8;
        }

        .back-button {
            background-color: #6b7280; 
            color: #fff;
            text-decoration: none; 
        }

        .back-button:hover {
            background-color: #4b5563;
        }


        .back-link {
            margin-top: 20px;
            text-decoration: none;
            color: #2563eb;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Новини Рахова</h1>
    </header>

    <div class="container">
        <form action="{{ route('news.store') }}" method="POST">
            @csrf

            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" placeholder="Введіть заголовок" required>

            <label for="content">Контент</label>
            <textarea name="content" id="content" placeholder="Введіть текст новини" required></textarea>

            <button type="submit">Додати новину</button>
        </form>

            
        <a href="{{ route('news.index') }}" class="back-button">Повернутися назад</a>

    </div>
</body>
</html>
