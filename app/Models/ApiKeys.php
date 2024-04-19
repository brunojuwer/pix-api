<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApiKeys extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'token',
        'institution_id',
    ];

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institutions::class);
    }

    public static function generate(string $name, int $id): string
    {

        if(static::alreadyHaveKey($id)){
            static::deletePreviousToken($id);
        }
        $token = static::generateToken();

        $hashedToken = password_hash($token, PASSWORD_BCRYPT);

        self::create([
            'name' => $name,
            'token' => $hashedToken,
            'institution_id' => $id
        ]);

        return $token;
    }

    private static function generateToken() {
        return bin2hex(random_bytes(32));
    }

    public static function validateToken(string $token, $id): bool
    {
        $hashedToken = self::find($id);
        return password_verify($token, $hashedToken);
    }

    public static function alreadyHaveKey($id): bool
    {
         return self::query()->where('institution_id', '=', $id)->exists();
    }

    public static function deletePreviousToken(int $id): void
    {
        self::query()->where('institution_id', '=', $id)->delete();
    }
}
