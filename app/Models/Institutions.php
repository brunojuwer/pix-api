<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Institutions extends Model
{
    use HasFactory;

    public function api_keys(): HasOne
    {
        return $this->hasOne(ApiKeys::class);
    }
}
