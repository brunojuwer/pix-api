<?php

namespace App\Http\Controllers;

use App\Services\AuthInstitutionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InstitutionAuthController extends Controller
{
    public function __construct(
        protected AuthInstitutionService $authService
    )
    {
        $this->authService = $authService;
    }


    public function login(Request $request): JsonResponse
    {
        $token = $this->authService->createToken($request);
        return response()->json([
            'access_token' => $token
        ], 201);
    }
}
