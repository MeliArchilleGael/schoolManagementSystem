<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cycle_id')->constrained('cycles', 'id')->cascadeOnDelete();
            $table->string('title')->unique();
            $table->integer('quantity')->default(25);
            $table->timestamps();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('code')->unique();
            $table->timestamps();
        });

        Schema::create('classroom_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classroom_id')->constrained('classrooms', 'id')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses', 'id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete();
            $table->foreignId('academic_year_id')->constrained('academic_years', 'id')->cascadeOnDelete();
            $table->integer('coef')->default(1);
            $table->timestamps();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
            $table->string('name');
            $table->string('surname');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('place_of_birth');
            $table->string('father_name')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('joint_academic_year');
            $table->integer('anciennete')->default(1);
            $table->longText('medical_info')->nullable();

            $table->foreignId('classroom_id')->constrained('classrooms', 'id')->cascadeOnDelete();
            $table->foreignId('academic_year_id')->constrained('academic_years', 'id')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('section_notes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });

        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            // foreign keys
            $table->foreignId('academic_year_id')->constrained('academic_years', 'id')->cascadeOnDelete();
            $table->foreignId('section_note_id')->constrained('section_notes', 'id')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('students', 'id')->cascadeOnDelete();
            $table->foreignId('classroom_id')->constrained('classroom_courses', 'classroom_id')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('classroom_courses', 'course_id')->cascadeOnDelete();
            $table->foreignId('classroom_course_id')->constrained('classroom_courses', 'id')->cascadeOnDelete();

            $table->decimal('note', 10,2)->nullable();
            $table->integer('writing')->nullable();
            $table->integer('speaking')->nullable();
            $table->integer('practical')->nullable();
            $table->integer('note_totale')->nullable();
            $table->string('grade')->nullable();
        });

        Schema::create('payment_types', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->decimal('amount',10,2);
            $table->date('start_promotion_date')->nullable();
            $table->date('end_promotion_date')->nullable();
            $table->integer('taux_reduction')->nullable();
            $table->foreignId('classroom_id')->constrained('classrooms', 'id')->cascadeOnDelete();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_amount',10,2)->nullable();
            $table->date('payment_date')->nullable();
            $table->foreignId('student_id')->constrained('students', 'id')->cascadeOnDelete();
            $table->foreignId('academic_year_id')->constrained('academic_years', 'id')->cascadeOnDelete();
            $table->foreignId('payment_type_id')->constrained('payment_types', 'id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('classroom_courses');
    }
};
