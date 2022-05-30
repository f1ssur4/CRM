<?php

namespace App\Http\Controllers;

use App\Events\AddSubscription;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Client;
use App\Models\Instructor;
use App\Models\Status;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index', ['clients' => Client::simplePaginate(10)]);
    }

    public function show($id)
    {
        return view('clients.show', [
            'client' => Client::findOrFail($id),
            'statuses' => Status::all(),
            'subscriptions' => Subscription::all()
        ]);
    }

    public function update(ClientUpdateRequest $request)
    {
        Client::edit($request->validated());
        return $this->returnWithMessage(config('messages.update_client_success'));
    }

    public function search(Request $request)
    {
        $result = Client::query()->where('name', 'LIKE' ,"%{$request->name}%")->orWhere('surname', 'LIKE' ,"%{$request->name}%")->orderBy('name')->simplePaginate(10);
        return view('clients.index', ['clients' => $result]);
    }

    public function addSubscription(Request $request)
    {
        Client::find($request->post('id'))->subscriptions()->attach($request->post('subscription'));
        $this->sendMailJob($request->post('subscription'), $request);
        return $this->returnWithMessage(config('messages.add_subscription_success'));
    }

    public function addView()
    {
        return view('clients.add', ['statuses' => Status::all(), 'instructors' => Instructor::all()]);
    }

    public function add(ClientRequest $request)
    {
        Client::create($request->validated());
        return $this->returnWithMessage(config('messages.add_client_success'));
    }

    // php artisan queue:work --queue=new_subscription  or  php artisan queue:work --queue=email,deleteTask,new_subscription
    private function sendMailJob($subscriptionId, $request)
    {
        AddSubscription::dispatch(
            $request->user()->login,
            Client::getNameSurnameById($request->post('id')),
            Subscription::getDataById($subscriptionId)
        );
    }

}
