<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Вход</h2>
        
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" name="login" placeholder="Логин" required><br><br>
            <input type="password" name="password" placeholder="Пароль" required><br><br>
            <button type="submit">Войти</button>
        </form>
        
        <p><a href="{{ route('register') }}">Нет аккаунта? Зарегистрироваться</a></p>
        <p><a href="{{ url('/') }}">На главную</a></p>
    </div>
</body>
</html>