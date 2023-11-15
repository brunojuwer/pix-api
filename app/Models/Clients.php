<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf'
    ];

    public static function findOrFailByCpf(string $cpf) {
        return self::where('cpf', $cpf)->firstOrFail();
    }

    public static function createClient(string $name, string $cpf)
    {
        return self::create([
            'name'=> $name,
            'cpf' => $cpf
        ]);
    }

    public static function findClientByClientKey($clientKey): self
    {
        return self::join("keys", "keys.client_id", "=", "clients.id")
                ->where("keys.name", $clientKey)
                ->select("clients.*")
                ->firstOrFail();
    }
}
