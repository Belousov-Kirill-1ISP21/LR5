<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новая заявка</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Новая заявка на курс</h2>
        
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        
        <form method="POST" action="{{ route('applications.store') }}">
            @csrf
            <select name="course_id" required>
                <option value="">Выберите курс</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }} - {{ $course->price }} руб.</option>
                @endforeach
            </select><br><br>
            
            <input type="date" name="start_date" required><br><br>
            <select name="payment_method" required>
                <option value="cash">Наличные</option>
                <option value="transfer">Перевод по номеру телефона</option>
            </select><br><br>
            <button type="submit">Отправить заявку</button>
        </form>
        
        <p><a href="{{ route('applications.index') }}">Мои заявки</a></p>
        <p><a href="{{ route('courses.index') }}">Все курсы</a></p>
        <p><a href="{{ url('/') }}">На главную</a></p>
    </div>
</body>
</html>