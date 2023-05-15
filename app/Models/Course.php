<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'maxpoint',
        'tutor_id',
        'status_id',
    ];
    public function tutor(){
        return $this->belongsTo(User::class,'tutor_id','id');
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }
    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
    public function studentCourses()
    {
        return $this->hasMany(StudentCourse::class);
    }
}
