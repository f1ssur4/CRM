<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructors';

    protected $fillable = [
      'name',
      'surname',
      'phone',
      'description',
      'art_id',
    ];
    public $timestamps = true;

    public function art()
    {
        return $this->belongsTo(Art::class);
    }

    public static function edit($validated_data)
    {
        return self::where('id', $validated_data['id'])->update($validated_data);
    }

    public static function getAll()
    {
        return Cache::remember('instructors', 60*60*24, function () {
            return self::all();
        });
    }

}
