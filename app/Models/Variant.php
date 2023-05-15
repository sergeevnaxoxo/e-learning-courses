<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img',
        'question_id',
        'description',
        'img',
    ];
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function rightQuestions()
    {
        return $this->hasMany(RightQuestion::class);
    }
}
