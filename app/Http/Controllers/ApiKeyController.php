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

        $token = ApiKeys::generate($data['name']);

        return response()->json([
            'access_token' => $token
        ]);
    }
}
