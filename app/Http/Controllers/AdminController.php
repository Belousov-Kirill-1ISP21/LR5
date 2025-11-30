<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class AdminController extends Controller
{
    public function index()
    {
        if (!session('admin') || !session('admin')) {
            return redirect('/');
        }
        
        $applications = Application::with(['user', 'course', 'status'])
            ->orderBy('id', 'desc')
            ->get();
            
        return view('admin.index', compact('applications'));
    }
    
    public function updateStatus(Request $request)
    {
        if (!session('admin')) {
            return redirect('/');
        }
        
        $application = Application::find($request->application_id);
        $application->update(['status_id' => $request->status_id]);
        
        return back()->with('success', 'Статус обновлен!');
    }
}