<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShiftDay extends Model
{
    use HasFactory;

    protected $fillable = ["id", 'label'];

    public $timestamps = false;

}
