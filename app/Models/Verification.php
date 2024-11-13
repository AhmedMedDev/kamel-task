<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'action',
    ];

    /**
     * Get the user that the verification belongs to.
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
