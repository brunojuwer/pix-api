<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitutionRequest;
use App\Models\Institutions;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{
    public function index(): Collection
    {
        return Institutions::all();
    }

  
    public function store(StoreInstitutionRequest $request): Institutions
    {
        $data = $request->validated();
        return Institutions::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cnpj): Institutions
    {
        return Institutions::query()->select()->where("cnpj", $cnpj)->first();
    }

    public function update(Request $request, string $id)
    {
        $institution = Institutions::findOrFail($id);
        $data = $request->all();

        $institution->update($data);

        return $institution;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
