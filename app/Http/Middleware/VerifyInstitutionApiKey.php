<?php

namespace App\Http\Middleware;

use App\Models\ApiKeys;
use App\Models\Institutions;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyInstitutionApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('ApiKey');
        $cnpj = $request->header('CNPJ');
        if($token && $cnpj) {
            $token = str_replace("Token ", "", $token);
            $institution = Institutions::findByApiKey($token);
            dd($institution->all());
        }
        return $next($request);
    }
}
