<?php

namespace App\Http\Controllers;

use App\Events\AddSubscription;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Status;
use App\Models\Subscription;
use Illuminate\Http\Request;

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

    public function update(ClientRequest $request)
    {
        Client::edit($request);
        return $this->returnWithMessage(config('messages.update_client_success'));
    }

    public function addSubscription(Request $request)
    {
        Client::find($request->post('id'))->subscriptions()->attach($request->post('subscription'));
        $this->sendMailJob($request);
        return $this->returnWithMessage(config('messages.update_client_success'));
    }

    // php artisan queue:work --queue=new_subscription  or  php artisan queue:work --queue=email,deleteTask,new_subscription
    private function sendMailJob($request)
    {
        AddSubscription::dispatch(
            $request->user()->login,
            Client::getNameSurnameById($request->post('id')),
            Subscription::getSubscriptionFullData($request->post('subscription'))
        );
    }

    private function sortView()
    {
        return view('clients.sorted', ['clients' => Client::orderBy(session('sortItem'))->simplePaginate(10)]);
    }

    public function sortBy(Request $request)
    {
        if (!is_null($request->post('sortItem'))) {
            session(['sortItem' => $request->post('sortItem')]);
            return $this->sortView();
        }
        return $this->sortView();
    }

    private function returnWithMessage($message = null)
    {
        return back()->withErrors($message);
    }
}
