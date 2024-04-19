<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Institutions extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
        'cnpj',
        'pix_url'
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

    public static function findByApiKey(string $key): Collection
    {
        return DB::table('institutions')
            ->join('api_keys', 'api_keys.institution_id', '=', 'institutions.id')
            ->where('api_keys.token', $key)
            ->select()
            ->get();
    }
}
