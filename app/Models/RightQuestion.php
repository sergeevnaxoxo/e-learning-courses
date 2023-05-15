<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RightQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'points',
        'question_id',
        'variant_id',
        'number',
    ];
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function variant(){
        return $this->belongsTo(Variant::class);
    }

}
