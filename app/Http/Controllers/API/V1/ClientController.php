<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientList;
use App\Http\Resources\ClientShowList;
use Illuminate\Http\Request;

class ClientController extends Controller
{


    use CoreJsonResponse;
    public function index()
    {
        $clients = ClientList::collection(Client::all());
        // return ClientList::collection(Client::all());
        return $this->ok($clients->resolve());
    }
    public function show(Client $client)
    {
        return new ClientShowList($client);
    }
}
