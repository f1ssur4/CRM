<?php

namespace App\Http\Controllers;
use App\Models\Client;
use \App\Models\ClientRequest;
use Illuminate\Http\Request;

class ClientRequestController extends Controller
{
    public function index()
    {
        return view('requests', ['requests' => ClientRequest::all()]);
    }

    public function delete($id)
    {
        ClientRequest::destroy($id);
        return $this->returnWithMessage(config('messages.delete_request_success'));
    }
}
