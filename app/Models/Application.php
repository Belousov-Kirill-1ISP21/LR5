<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $timestamps = false; 
    
    protected $table = 'applications';
    
    protected $fillable = [
        'user_id', 'course_id', 'start_date', 'payment_method', 'status_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function status()
    {
        return $this->belongsTo(ApplicationStatus::class, 'status_id');
    }
}