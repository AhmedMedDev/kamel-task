<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    // this table will save activities of other models like create, update, delete
    protected $table = 'activity_logs';

    protected $fillable = [
        'user_id',
        'model',
        'model_id',
        'activity',
        'activity_type',
        'activity_details',
    ];
}
