<?php

namespace App\Models;

use App\Http\Requests\ClientRequest;
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

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }


    public static function edit(ClientRequest $request)
    {
       return Client::where('id', $request->post('id'))->update([
            'phone' => $request->post('phone'),
            'status_id' => Status::where('title', $request->post('status'))->get('id')[0]->id,
            'comment' => $request->post('comment')
        ]);
    }

    public static function getNameSurnameById($id)
    {
       return self::where('id', $id)->get()
            ->map(function ($client) {
                return $client->name . ' ' . $client->surname;
            })[0];
    }
}
