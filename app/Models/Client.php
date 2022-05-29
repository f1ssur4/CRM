<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'advertising',
        'comment',
        'status_id',
        'instructor_id'
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

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }


    public static function edit($validated_data)
    {
        return Client::where('id', $validated_data['id'])->update($validated_data);
    }

    public static function getNameSurnameById($data)
    {
        return self::where('id', $data)->get()
            ->map(function ($client) {
                return $client->name . ' ' . $client->surname;
            })[0];
    }

    public static function getClientIdWithSub()
    {
        $clients = [];
        $clients_subs = DB::table('clients_subscriptions')->groupBy('client_id')->distinct()->get('client_id');
        foreach ($clients_subs as $client_sub) {
            $clients[] = self::where('id', $client_sub->client_id)->get();
        }
        return $clients;
    }

}
