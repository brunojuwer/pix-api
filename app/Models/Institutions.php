<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Institutions extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cnpj',
        'api_key_id'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function api_keys(): HasOne
    {
        return $this->hasOne(ApiKeys::class);
    }

    public static function findOrfailByCnpj(string $cnpj): self
    {
        return self::query()->where("cnpj", $cnpj)->first();
    }
}
