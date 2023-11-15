<?php

namespace App\Services;

use App\Models\Institutions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PixPaymentService {


  public static function pay($data, $payerInstitution, $payeeInstitution, $payerClient, $payeeClient) {
        return Http::post($payeeInstitution['pix_url'], [
            'value' => $data['value'],
            'payer' => [
              'name'=> $payerClient['name'],
              'key' => $data['payer_key']
            ],
            'payee' => [
              'name'=> $payeeClient['name'],
              'key' => $data['payee_key']
            ],
            'payer_institution' => [
              'name' => $payerInstitution['name'],
              'cnpj' => $payerInstitution['cnpj']
            ], 
            'payee_institution' => [
              'name' => $payeeInstitution['name'],
              'cnpj' => $payeeInstitution['cnpj']
            ], 
        ])->throw()->json();
  }
}