<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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

    public static function getAll()
    {
        return Cache::remember('arts', 60*60*24, function () {
            return self::all();
        });
    }
}
