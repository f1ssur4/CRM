<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $table = 'arts';

    protected $fillable = [
      'title',
      'school_id'
    ];

    public $timestamps = true;

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }
}
