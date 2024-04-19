<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstitutionRequest;
use App\Models\Institutions;
use Illuminate\Http\Request;

class InstitutionsController extends Controller
{

    public function store(StoreInstitutionRequest $request): Institutions
    {
        $data = $request->validated();
        return Institutions::create($data);
    }

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
}
