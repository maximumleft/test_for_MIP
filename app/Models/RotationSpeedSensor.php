<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RotationSpeedSensor extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function getCreatedMinuteAttribute(): int
    {
        return intval(date('i', strtotime($this->created_at))) ;
    }
}
