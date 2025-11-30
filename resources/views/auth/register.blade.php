<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Регистрация</h2>
        
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input type="text" name="login" placeholder="Логин" required><br><br>
            <input type="password" name="password" placeholder="Пароль" required><br><br>
            <input type="text" name="full_name" placeholder="ФИО" required><br><br>
            <input type="text" name="phone" placeholder="Телефон" required><br><br>
            <input type="email" name="email" placeholder="Email" required><br><br>
            <button type="submit">Зарегистрироваться</button>
        </form>
        
        <p><a href="{{ route('login') }}">Уже есть аккаунт? Войти</a></p>
        <p><a href="{{ url('/') }}">На главную</a></p>
    </div>
</body>
</html>