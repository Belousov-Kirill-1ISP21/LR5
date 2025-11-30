<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false; 
    
    protected $table = 'users';
    
    protected $fillable = [
        'login', 'password', 'full_name', 'phone', 'email', 'role_id'
    ];
    
    protected $hidden = [
        'password'
    ];
    
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }
}