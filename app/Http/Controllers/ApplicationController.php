<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Course;

class ApplicationController extends Controller
{
    public function create()
    {
        if (!session('user_id') || session('admin')) {
            return redirect('/');
        }
        
        $courses = Course::all();
        return view('applications.create', compact('courses'));
    }
    
    public function store(Request $request)
    {
        if (!session('user_id') || session('admin')) {
            return redirect('/');
        }
        
        Application::create([
            'user_id' => session('user_id'),
            'course_id' => $request->course_id,
            'start_date' => $request->start_date,
            'payment_method' => $request->payment_method,
            'status_id' => 1
        ]);
        
        return back()->with('success', 'Заявка отправлена!');
    }
    
    public function index()
    {
        if (!session('user_id') || session('admin')) {
            return redirect('/');
        }
        
        $applications = Application::with(['course', 'status'])
            ->where('user_id', session('user_id'))
            ->orderBy('id', 'desc')
            ->get();
            
        $courses = Course::all();
        
        return view('applications.index', compact('applications', 'courses'));
    }
}