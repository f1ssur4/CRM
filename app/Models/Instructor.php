<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'instructors';

    public $timestamps = true;

    public function art()
    {
        return $this->belongsTo(Art::class);
    }

    public static function edit($validated_data)
    {
        return self::where('id', $validated_data['id'])->update($validated_data);
    }

}
