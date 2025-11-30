<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Панель администратора</h2>
        
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        
        <h3>Все заявки</h3>
        @if($applications->count() > 0)
            <table>
                <tr>
                    <th>Пользователь</th>
                    <th>Курс</th>
                    <th>Преподаватель</th>
                    <th>Дата начала</th>
                    <th>Статус</th>
                    <th>Изменить статус</th>
                </tr>
                @foreach($applications as $row)
                <tr>
                    <td>{{ $row->user->full_name }} ({{ $row->user->login }})</td>
                    <td>{{ $row->course->name }}</td>
                    <td>{{ $row->course->teacher_name }}</td>
                    <td>{{ $row->start_date }}</td>
                    <td>{{ $row->status->name }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.update-status') }}" class="inline-form">
                            @csrf
                            <input type="hidden" name="application_id" value="{{ $row->id }}">
                            <select name="status_id">
                                <option value="1" {{ $row->status_id == 1 ? 'selected' : '' }}>Новая</option>
                                <option value="2" {{ $row->status_id == 2 ? 'selected' : '' }}>Обучается</option>
                                <option value="3" {{ $row->status_id == 3 ? 'selected' : '' }}>Завершено</option>
                            </select>
                            <button type="submit">Обновить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        @else
            <p>Нет заявок</p>
        @endif
        
        <p><a href="{{ url('/') }}">На главную</a></p>
    </div>
</body>
</html>