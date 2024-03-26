<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKeys extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'token',
        'institution_id',
    ];

    public static function generate(string $name): string
    {
        
        $token = static::generateToken();
        
        $hashedToken = password_hash($token, PASSWORD_BCRYPT);

        self::create([
            'name' => $name,
            'token' => $hashedToken,
            'institution_id' => 1
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
}
