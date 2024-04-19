<?php

namespace App\Http\Controllers;

use App\Models\ApiKeys;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiKeyController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->all();

        $id = $request->user()['id'];

        $token = ApiKeys::generate($data['name'], $id);

        return response()->json([
            'api_key' => $token
        ]);
    }
}
