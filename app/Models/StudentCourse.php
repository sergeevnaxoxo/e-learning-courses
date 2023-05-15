<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'totalpoints',
        'course_id',
        'student_id',
    ];
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function student(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
