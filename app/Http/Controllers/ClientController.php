<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\ClientSubscription;
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
        return view('clients.show', ['client' => Client::find($id), 'statuses' => Status::all(), 'subscriptions' => Subscription::all()]);
    }

    public function update(ClientRequest $request)
    {
        return Client::where('id', $request->post('id'))->update([
            'phone' => $request->post('phone'),
            'status_id' => Status::where('title', $request->post('status'))->get('id')[0]->id,
            'comment' => $request->post('comment')
        ])
            ? $this->returnWithMessage(config('messages.update_client_success'))
            : $this->returnWithMessage(config('messages.update_client_error'));
    }

    public function addSubscription(Request $request)
    {
        Client::find($request->post('id'))->subscriptions()->attach($request->post('subscription'));
        return $this->returnWithMessage(config('messages.update_client_success'));
    }

    private function returnWithMessage($message = null)
    {
        return back()->withErrors($message);
    }
}
