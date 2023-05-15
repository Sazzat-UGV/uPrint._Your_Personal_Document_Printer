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
    $teachers = [
        'Md Zahid Akon'=>'Teaching Assistant',
        'Muntasir Rahman'=>'Lecturer',
        'Md. Mahadi Hasan Shaon'=>'Lecturer',
        'Md. Riadul Islam'=>'Lecturer',
        'Md. Masudur Rahman'=>'Lecturer',
        'Md. Tariqul Islam'=>'Lecturer',
        'Partho Sarathi Sarker'=>'Asst. Professor & Co-Chairman',
        'Md Abdur Razzak'=>'Senior Lecturer & Chairman',
    ];

    foreach ($teachers as $key => $value) {
        Teacher::create([
            'department_id' => 9,
            'teacher_name' => $key,
            'slug' => Str::slug($key),
            'teacher_designation' => $value,
        ]);
    }
}


}


