<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserToken extends BaseModel
{
    use HasFactory;

    protected $table = 'user_tokens';

    protected $fillable = [
        'user_id',
        'device_token',
        'device_type',
    ];

    public function user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
