<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $table = 'arts';

    public $timestamps = true;

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
