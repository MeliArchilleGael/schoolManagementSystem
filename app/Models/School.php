<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $keyType = "uuid";
    public $incrementing = false;

    protected $fillable = [
        'name',
        'location',
        'tel',
        'email',
        'bo_pox',
        'devis',
    ];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
