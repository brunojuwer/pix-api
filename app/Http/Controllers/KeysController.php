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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKeysRequest $request)
    {
        $data = $request->validated();
        return KeysService::create(new Clients, $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
