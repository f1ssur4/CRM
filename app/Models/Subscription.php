<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function getSubscriptionFullData($id)
    {
        return self::where('id', $id)->get()->map(function($subs) {
            return $subs->title . ' ' . $subs->minutes . ' ' . $subs->count_lessons . ' ' . $subs->price;
        })[0];
    }
}
