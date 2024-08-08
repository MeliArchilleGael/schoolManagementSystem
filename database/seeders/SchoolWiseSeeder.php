<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Cycle;
use App\Models\School;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolWiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicYear::query()->create([
            'annee_academic' => '2023 - 2024',
            'active' => false,
        ]);
        AcademicYear::query()->create([
            'annee_academic' => '2024 - 2025',
            'active' => true,
        ]);

        $school = School::query()->create([
            'name' => 'COLLEGE NUAYU',
            'location' => 'MBANKOMO',
            'tel' => 699501442,
            'email' => 'nuayu@gmail.com',
            'bo_pox' => '54',
            'devis' => 'Peace - Work - Fatherland'
        ]);

        $section1 = Section::query()->create([
            'school_id' => $school->id,
            'title' => 'PRIMAIRE'
        ]);
        $section2 = Section::query()->create([
            'school_id' => $school->id,
            'title' => 'SECONDAIRE'
        ]);


        Cycle::query()->create([
            'section_id' => $section1->id,
            'title' => 'ANGLOPHONE'
        ]);
        Cycle::query()->create([
            'section_id' => $section1->id,
            'title' => 'FRANCOPHONE'
        ]);


        Cycle::query()->create([
            'section_id' => $section2->id,
            'title' => 'ANGLOPHONE'
        ]);
        Cycle::query()->create([
            'section_id' => $section2->id,
            'title' => 'ANGLOPHONE'
        ]);


        Classroom::query()->create([
            'cycle_id' => 2,
            'title' => '6e A',
            'quantity' => 25
        ]);
        Classroom::query()->create([
            'cycle_id' => 2,
            'title' => '6e B',
            'quantity' => 25
        ]);
        Classroom::query()->create([
            'cycle_id' => 3,
            'title' => 'Class 1',
            'quantity' => 25
        ]);
        Classroom::query()->create([
            'cycle_id' => 3,
            'title' => 'Class 2',
            'quantity' => 25
        ]);
        Course::query()->create([
            'title' => 'GEOGRAPHIE',
            'code' => 'GEO'
        ]);
        Course::query()->create([
            'title' => 'HISTOIRE',
            'code' => 'HIS'
        ]);
    }
}
