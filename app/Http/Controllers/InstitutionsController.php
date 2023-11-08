<?php

namespace App\Http\Controllers;

use App\Models\Institutions;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    public function index(): Collection
    {
        return Institutions::all();
    }

  
    public function store(Request $request): Institutions
    {
        $data = $request->all();

        return Institutions::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cnpj): Institutions
    {
        return Institutions::query()->select()->where("cnpj", $cnpj)->first();
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
    public function destroy(string $id)
    {
        //
    }
}
