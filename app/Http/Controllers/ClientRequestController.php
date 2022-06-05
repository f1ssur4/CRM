<?php

namespace App\Http\Controllers;
use App\Models\Client;
use \App\Models\ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientRequestController extends Controller
{
    public function index()
    {
        return view('requests', ['requests' => ClientRequest::all()]);
    }

    public function delete($id)
    {
        try {
            ClientRequest::destroy($id);
            return $this->returnWithMessage(config('messages.delete_request_success'));
        }catch (\Exception $exception){
            Log::error(config('messages.delete_request_error.delete_request_error'), [$exception->getMessage()]);
            return $this->returnWithMessage(config('messages.delete_request_error'));
        }

    }
}
