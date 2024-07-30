<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SectionNote extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $keyType = "string";


    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class);
    }
}
