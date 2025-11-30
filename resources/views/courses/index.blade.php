<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все курсы</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h2>Все курсы</h2>
        
        @foreach($courses as $course)
        <div class="course-block">
            <h3>{{ $course->name }}</h3>
            <p><strong>Преподаватель:</strong> {{ $course->teacher_name }}</p>
            <p><strong>Описание:</strong> {{ $course->description }}</p>
            <p><strong>Продолжительность:</strong> {{ $course->duration_hours }} часов</p>
            <p><strong>Цена:</strong> {{ $course->price }} руб.</p>
            
            <div class="course-rating">
                <strong>Рейтинг курса:</strong> 
                @if ($course->avg_rating > 0)
                    <span class="rating-value">{{ $course->avg_rating }}/5</span>
                    ({{ $course->review_count }} отзывов)
                @else
                    <span>ещё нет оценок</span>
                @endif
            </div>
            
            <div class="course-reviews">
                <h4>Отзывы:</h4>
                @if($course->reviews->count() > 0)
                    @foreach($course->reviews as $review)
                    <div class="review-item">
                        <p><strong>{{ $review->user->full_name }}</strong> 
                        (Оценка: {{ $review->rating }}/5)</p>
                        <p>{{ $review->comment }}</p>
                        <small>{{ $review->created_at }}</small>
                    </div>
                    @endforeach
                @else
                    <p>Пока нет отзывов</p>
                @endif
            </div>
        </div>
        @endforeach
        
        <p><a href="{{ url('/') }}">На главную</a></p>
    </div>
</body>
</html>