<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cycle(): BelongsTo
    {
        return $this->belongsTo(Cycle::class);
    }

    public function classroomCourses(): HasMany
    {
        return $this->hasMany(ClassroomCourse::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function paymentTypes(): HasMany
    {
        return $this->hasMany(PaymentType::class);
    }

    public function marks(): HasManyThrough
    {
        return $this->hasManyThrough(Mark::class, ClassroomCourse::class);
    }
}
