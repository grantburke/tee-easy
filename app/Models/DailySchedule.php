<?php

namespace App\Models;

use App\Models\Traits\BelongsToCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailySchedule extends Model
{
    use BelongsToCourse, HasFactory;

    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }
}
