<?php

namespace App\Services;
use App\Models\Clients;
use App\Models\Institutions;
use App\Models\Keys;

class KeysService {

  public static function create($client, $data) {
    $institution = Institutions::findOrFailByCnpj($data['cnpj']);
    
    try {
      $client = Clients::findOrFailByCpf($data['cpf']);
  } catch (\Throwable $th) {
      $client = Clients::createClient($data['clientName'], $data['cpf']);            
  }

  return Keys::create([
          'name'            => $data['keyName'],
          'client_id'       => $client['id'],
          'institutions_id' => $institution['id'],
      ]);
  }
}