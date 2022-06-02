<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequestRequest;
use App\Http\Resources\RequestResource;
use App\Models\ClientRequest;

class ClientRequestController extends Controller
{
    public function store(ClientRequestRequest $request)
    {
        $client_request = ClientRequest::create($request->validated());
        return response(new RequestResource($client_request), 201);
    }
}
