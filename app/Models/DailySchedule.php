<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailySchedule extends Model
{
    use HasFactory;

    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }
}
