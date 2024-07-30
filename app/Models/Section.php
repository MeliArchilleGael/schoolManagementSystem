<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $keyType = "string";
    public $incrementing = false;

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function cycles(): HasMany
    {
        return $this->hasMany(Cycle::class);
    }
}
