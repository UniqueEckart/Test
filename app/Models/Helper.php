<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Helper extends Model
{
    use HasFactory;

    protected $fillable = ["id", "workArea", "notes"];
    public $timestamps = false;

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
}
