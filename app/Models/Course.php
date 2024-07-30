<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $keyType = "string";

    public function classroomCourses(): HasMany
    {
        return $this->hasMany(ClassroomCourse::class);
    }

    public function marks(): HasManyThrough
    {
        return $this->hasManyThrough(Mark::class, ClassroomCourse::class);
    }
}
