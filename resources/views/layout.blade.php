<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корочки.есть</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Портал "Корочки.есть"</h1>
        
        @if (!session('user_id') && !session('admin'))
            <p><a href="{{ route('login') }}">Войти</a></p>
            <p><a href="{{ route('register') }}">Зарегистрироваться</a></p>
            <p><a href="{{ route('courses.index') }}">Все курсы</a></p>
        @else
            @if (session('admin'))
                <p><a href="{{ route('admin.index') }}">Панель администратора</a></p>
            @else
                <p><a href="{{ route('applications.create') }}">Оставить заявку</a></p>
                <p><a href="{{ route('applications.index') }}">Мои заявки</a></p>
            @endif
            <p><a href="{{ route('courses.index') }}">Все курсы</a></p>
            <p><a href="{{ route('logout') }}">Выйти</a></p>
        @endif
    </div>
</body>
</html>