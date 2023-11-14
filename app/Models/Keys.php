<?php

declare(strict_types= 1);

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Keys extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client_id',
        'institutions_id',
    ];


    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class);
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institutions::class);
    }

    public static function findOrFailByName(string $name): self
    {
        return self::where('name', $name)->firstOrFail();
    }

    public static function findAllKeysByClientCpf(string $cpf): Collection
    {
        return DB::table('keys')
                    ->join('clients', 'clients.id', '=', 'keys.client_id')
                    ->where('clients.cpf', $cpf)
                    ->select('keys.*')
                    ->get();
    }
}