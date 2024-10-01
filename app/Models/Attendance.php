<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attendance extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ["id", "helper_id", "shift_id", "startedWorking", "checkedIn"];

    public function day(): HasMany
    {
        return $this->hasMany(ShiftDay::class, "id", "shift_id");
    }
}
