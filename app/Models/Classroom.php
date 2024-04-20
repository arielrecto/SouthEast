<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'class_code',
        'description',
        'subject_id',
        'strand_id',
        'teacher_id'
    ];


    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function strand(){
        return $this->belongsTo(Strand::class);
    }

    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
