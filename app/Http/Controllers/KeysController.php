<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeysRequest;
use App\Models\Clients;
use App\Models\Keys;
use App\Services\KeysService;

class KeysController extends Controller
{

    public function store(StoreKeysRequest $request)
    {
        $data = $request->validated();
        return KeysService::create(new Clients, $data);
    }
  
    public function show(string $cpf)
    {
        return Keys::findAllKeysByClientCpf($cpf);
    }

    public function destroy(string $name)
    {
        $key = Keys::findOrFailByName($name);
        $key->delete();
        return response()->json([], 204);
    }
}
