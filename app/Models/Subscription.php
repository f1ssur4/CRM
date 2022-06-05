<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    protected $fillable = [
        'title',
        'minutes',
        'count_lessons',
        'price'
    ];


    public function clients()
    {
        return $this->belongsToMany(Client::class, 'clients_subscriptions')
            ->withTimestamps();
    }

    public static function getDataById($id)
    {
        return self::where('id', $id)->get();
    }

    public static function getAll()
    {
        return Cache::remember('subscriptions', 60*60*24, function () {
            return self::all();
        });
    }
}
