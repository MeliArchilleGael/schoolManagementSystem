<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicYear extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $keyType = "string";

    public function classroomCourses(): HasMany
    {
        return $this->hasMany(ClassroomCourse::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

}
