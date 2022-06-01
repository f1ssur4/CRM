<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statistics extends Model
{
    use HasFactory;

    protected $table = "statistics";

    protected $fillable = [
        'subscriptions',
        'lessons',
        'income'
    ];



    public static function updateLessonsIncrement()
    {
        DB::table('statistics')->increment('lessons', 1);
    }

    public static function updateLessonsDecrement()
    {
        DB::table('statistics')->decrement('lessons', 1);
    }

    public static function updateSubscriptions()
    {
        DB::table('statistics')->increment('subscriptions', 1);
    }

    public static function updateIncome($price)
    {
        DB::table('statistics')->increment('income', $price);
    }
}

