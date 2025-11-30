<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        if ($request->login === 'Admin' && $request->password === 'KorokNET') {
            session(['admin' => true, 'user_id' => 0]);
            return redirect('/');
        }
        
        $user = User::where('login', $request->login)->first();
        
        if ($user && $request->password === $user->password) {
            session(['user_id' => $user->id, 'admin' => $user->role_id == 0]);
            return redirect('/');
        }
        
        return back()->with('error', 'Неверный логин или пароль');
    }
    
    public function showRegister()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        try {
            $user = User::create([
                'login' => $request->login,
                'password' => $request->password, 
                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'role_id' => 1
            ]);
            
            return back()->with('success', 'Регистрация успешна!');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            
            if (strpos($errorMessage, 'login') !== false) {
                $error = "Логин уже занят";
            } elseif (strpos($errorMessage, 'email') !== false) {
                $error = "Email уже занят";
            } elseif (strpos($errorMessage, 'phone') !== false) {
                $error = "Телефон уже занят";
            } else {
                $error = "Ошибка регистрации: " . $errorMessage;
            }
            
            return back()->with('error', $error);
        }
    }
    
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}