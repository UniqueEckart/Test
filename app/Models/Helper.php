<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Helper extends Model
{
    use HasFactory;

    protected $fillable = ["registrationID", "work_area_id", "notes"];
    public $timestamps = false;

    protected $primaryKey = "registrationID";

    public function attendance(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function work(): HasMany
    {
        return $this->hasMany(WorkArea::class, "id", "work_area_id");
    }
}
