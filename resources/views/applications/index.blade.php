<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои заявки</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Мои заявки</h2>
        
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        
        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
        
        <h3>Мои заявки на курсы</h3>
        @if($applications->count() > 0)
            <table>
                <tr>
                    <th>Курс</th>
                    <th>Преподаватель</th>
                    <th>Цена</th>
                    <th>Дата начала</th>
                    <th>Статус</th>
                    <th>Отзыв</th>
                </tr>
                @foreach($applications as $row)
                <tr>
                    <td>{{ $row->course->name }}</td>
                    <td>{{ $row->course->teacher_name }}</td>
                    <td>{{ $row->course->price }} руб.</td>
                    <td>{{ $row->start_date }}</td>
                    <td>{{ $row->status->name }}</td>
                    <td>
                        @if ($row->status_id == 3)
                            <a href="?review={{ $row->course_id }}#review-form">
                                <button>Оставить отзыв</button>
                            </a>
                        @else
                            Завершите курс, чтобы оставить отзыв.
                        @endif
                    </td>
                </tr>
                
                @if(request('review') == $row->course_id && $row->status_id == 3)
                <tr>
                    <td colspan="6">
                        <div id="review-form" style="background: #f9f9f9; padding: 15px; margin: 10px 0;">
                            <h4>Оставить отзыв о курсе "{{ $row->course->name }}"</h4>
                            <form method="POST" action="{{ route('reviews.store') }}">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $row->course_id }}">
                                <select name="rating" required>
                                    <option value="5">5 - Отлично</option>
                                    <option value="4">4 - Хорошо</option>
                                    <option value="3">3 - Нормально</option>
                                    <option value="2">2 - Плохо</option>
                                    <option value="1">1 - Ужасно</option>
                                </select><br><br>
                                <textarea name="comment" placeholder="Ваш отзыв о курсе" rows="4" cols="50" required></textarea><br><br>
                                <button type="submit">Отправить отзыв</button>
                                <a href="{{ route('applications.index') }}"><button type="button">Отмена</button></a>
                            </form>
                        </div>
                    </td>
                </tr>
                @endif
                
                @endforeach
            </table>
        @else
            <p>У вас нет заявок</p>
        @endif
        
        <p><a href="{{ route('applications.create') }}">Оставить новую заявку</a></p>
        <p><a href="{{ route('courses.index') }}">Все курсы</a></p>
        <p><a href="{{ url('/') }}">На главную</a></p>
    </div>
</body>
</html>