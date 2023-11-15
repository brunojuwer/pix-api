<?php

namespace App\Http\Controllers;

use App\Http\Requests\PixPaymentRequest;
use App\Models\Clients;
use App\Models\Institutions;
use App\Services\PixPaymentService;
use Illuminate\Http\Request;

class PixPaymentController extends Controller
{
    public function pay(PixPaymentRequest $request) 
    {
        $data = $request->validated();
        $payerInstitution = Institutions::findInstitutionByClientKey($data["payer_key"]);
        $payeeInstitution = Institutions::findInstitutionByClientKey($data["payee_key"]);

        $payerClient = Clients::findClientByClientKey($data["payer_key"]);
        $payeeClient = Clients::findClientByClientKey($data["payee_key"]);

        return PixPaymentService::pay($data, $payerInstitution, $payeeInstitution, $payerClient, $payeeClient);
    }
}
