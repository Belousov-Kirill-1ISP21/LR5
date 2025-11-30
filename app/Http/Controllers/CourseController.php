<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['reviews.user'])->get();
        
        $courses->each(function($course) {
            $course->avg_rating = $course->reviews->avg('rating') ? round($course->reviews->avg('rating'), 1) : 0;
            $course->review_count = $course->reviews->count();
        });
        
        return view('courses.index', compact('courses'));
    }
}