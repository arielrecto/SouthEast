<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'classroom_id'
    ];


    public function classroom (){
        return $this->belongsTo(Classroom::class);
    }

}
