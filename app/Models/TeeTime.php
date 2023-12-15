<?php

namespace App\Models;

use App\Models\Traits\BelongsToCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeeTime extends Model
{
    use BelongsToCourse, HasFactory;
}
