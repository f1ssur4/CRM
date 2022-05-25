<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    public $timestamps = true;

    public function teacher()
    {
        return $this->belongsTo(Instructor::class, 'teacher_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

}
