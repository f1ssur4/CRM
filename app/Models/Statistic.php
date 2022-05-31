<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Statistic extends Model
{
    use HasFactory;

    protected $table = "statistic";
    protected $fillable = [
        'subscriptions',
        'lessons',
        'income'
    ];



    public static function updateLessonsIncrement()
    {
        DB::table('statistic')->increment('lessons', 1);
    }

    public static function updateLessonsDecrement()
    {
        DB::table('statistic')->decrement('lessons', 1);
    }

    public static function updateSubscriptions()
    {
        DB::table('statistic')->increment('subscriptions', 1);
    }

    public static function updateIncome($price)
    {
        DB::table('statistic')->increment('income', $price);
    }
}

