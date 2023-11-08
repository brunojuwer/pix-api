<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keys extends Model
{
    use HasFactory;

    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class);
    }

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institutions::class);
    }
}