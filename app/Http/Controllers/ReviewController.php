<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        if (!session('user_id') || session('admin')) {
            return redirect('/');
        }
        
        Review::create([
            'user_id' => session('user_id'),
            'course_id' => $request->course_id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);
        
        return back()->with('success', 'Отзыв добавлен!');
    }
}