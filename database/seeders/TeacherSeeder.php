<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $designation = [
        'Teaching Assistant',
        'Senior Lecturer & Chairman',
        'Asst. Professor & Co-Chairman',
        'Lecturer',
    ];

    $teachers = [
        'Md Zahid Akon',
        'Muntasir Rahman',
        'Md. Mahadi Hasan Shaon',
        'Md. Riadul Islam',
        'Md. Masudur Rahman',
        'Md. Tariqul Islam',
        'Partho Sarathi Sarker',
        'Md Abdur Razzak',
    ];

    $totalTeachers = count($teachers);
    $totalDesignations = count($designation);

    $designation[1] = $teachers[$totalTeachers - 1];

    foreach ($teachers as $key => $teacher) {
        if ($key === 0 || $key === 6 || $key === 7) {
            $teacherDesignation = $designation[$key % $totalDesignations];
        } else {
            $teacherDesignation = $designation[3];
        }

        $teacher = Teacher::create([
            'department_id' => 9,
            'teacher_name' => $teacher,
            'slug' => Str::slug($teacher),
            'teacher_designation' => $teacherDesignation,
        ]);
    }
}


}


