<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [

            'CSE-409' => 'Pattern Recognition',
            'CSE-506' => 'Unix Programming',
            'CSE-508' => 'Fault Tolerant System',
            'CSE-509' => 'Digital Pulse Technique',


            'CSE-504' => 'Simulation & Modelling',
            'CSE-407' => 'Advance Computer Architecture',
            'CSE-411' => 'VLSI Design',
            'CSE-405' => 'Artificial Intelligence',
            'CSE-403' => 'Internet Working & Web Design',
            'CSE-401' => 'RDBMS Programming',


            'CSE-316' => 'Management Information System',
            'CSE-311' => 'Computer Network & Security',
            'CSE-313' => 'Parallel & Distributed Processing',
            'CSE-314' => 'Computer Peripherals & Interfacing',
            'CSE-503' => 'Machine Learning',
            'CSE-317' => 'Multimedia Application ',


            'CSE-304' => 'Object Oriented Analysis & Design',
            'CSE-307' => 'Computer Graphics',
            'CSE-301' => 'Compiler Design',
            'CSE-303' => 'Data & Telecommunication',
            'CSE-309' => 'Digital Signal Processing',
            'CSE-306' => 'Software Engineering',


            'CSE-211' => 'Microprocessor & Assembly Language',
            'CSE-214' => 'Communication Engineering',
            'CSE-209' => 'Object Oriented Programming',
            'ACN-1008' => 'Principle of Accounting',
            'CSE-215' => 'System Analysis & Design',
            'CSE-213' => 'Theory of Computing',


            'CSE-206' => 'Discrete Mathematics ',
            'MATH-III-1013' => 'Mathematics-III',
            'CSE-201' => 'Computer Organization & Architecture',
            'CSE-202' => 'Database Management System',
            'CSE-207' => 'Algorithm Design',
            'CSE-204' => 'Introduction to Operating System',


            'CSE-111' => 'Data Structure',
            'CSE-107' => 'Principles of Electronics ',
            'CSE-109' => 'Digital Electronics ',
            'ENG-II-903' => 'Advanced English',
            'MATH-II-1012' => 'Mathematics-II',
            'STS-907' => 'Applied Statistics ',


            'Eng-I-902' => 'Basic English',
            'Math-I-1011' => 'Mathematics-I',
            'Phys-1014' => 'Physics',
            'CSE-101' => 'Introduction to Computer and Programming',
            'CSE-103' => 'Structured Programming',
            'CSE-105' => 'Electrical Circuits',
            'BDS- 907' => 'Bangladesh Studies ',
        ];

        $counter = 0;
        foreach ($subjects as $key => $value) {
            $counter++;
            if ($counter >= 1 && $counter <= 4) {
                $val = 8;
                $dept=9;
            }
            elseif ($counter >= 5 && $counter <= 10) {
                $val = 7;
                $dept=9;
            }
            elseif ($counter >= 11 && $counter <= 16) {
                $val = 6;
                $dept=9;
            }
            elseif ($counter >= 17 && $counter <= 22) {
                $val = 5;
                $dept=9;
            }
            elseif ($counter >= 23 && $counter <= 28) {
                $val = 4;
                $dept=9;
            }
            elseif ($counter >= 29 && $counter <= 34) {
                $val = 3;
                $dept=9;
            }
            elseif ($counter >= 35 && $counter <= 40) {
                $val = 2;
                $dept=9;
            }
            elseif ($counter >= 41 && $counter <= 47) {
                $val = 1;
                $dept=9;
            }
            Subject::create([
                'subject_name'=> $value,
                'slug'=> Str::slug($value),
                'subject_code' => $key,
                'semester_id' => $val,
                'department_id'=>$dept,
            ]);
        }
    }
}

