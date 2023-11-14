<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeysRequest;
use App\Models\Clients;
use App\Models\Keys;
use Illuminate\Http\Request;
use App\Services\KeysService;

class KeysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function store(StoreKeysRequest $request)
    {
        $data = $request->validated();
        return KeysService::create(new Clients, $data);
    }

  
    public function show(string $cpf)
    {
        return Keys::findAllKeysByClientCpf($cpf);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $name)
    {
        $key = Keys::findOrFailByName($name);
        $key->delete();
        return response()->json([], 204);
    }
}
