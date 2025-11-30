<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false; 
    
    protected $table = 'courses';
    
    protected $fillable = [
        'name', 'description', 'price', 'teacher_name', 'duration_hours'
    ];
    
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}