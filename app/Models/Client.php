<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'advertising',
    ];

    public $timestamps = true;

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'clients_subscriptions')
            ->withTimestamps();
    }
}
