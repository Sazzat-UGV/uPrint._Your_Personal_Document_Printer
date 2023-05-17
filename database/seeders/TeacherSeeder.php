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

            //Social Science
            'Alomgir Hossain' => 'Lecturer',

            //Mathematics
            'Md Parvej Chowdhury' => 'Lecturer',
            'Md. Rakibul Islam' => 'Lecturer',
            'Md. Mahbubur Rahman' => 'Lecturer & Chairman',

            //Physics & Astronomy
            'Ruhol Amin' => 'Lecturer',
            'Dr. Md. Farid Ahmed' => 'Professor',

            //English
            'Jannatul Tajri' => 'Lecturer',
            'Shamolima Shahid Khan' => 'Lecturer',
            'Adnan Shakur' => 'Lecturer & Co-Chairman',
            'Ziaul Haque' => 'Assistant Professor & Chairman',

            //Business Administration
            'Biplob Hossain' => 'Lecturer',
            'Nusrat Afrin Nadi' => 'Lecturer',
            'Md Al Sabahel' => 'Lecturer',
            'Md. Mohibul Alam Dolon' => 'Assistant Professor',
            'Md Karimul Alam' => 'Assistant Professor',
            'Md. Hazrat Ali' => 'Assistant Professor',
            'Gazi Md. Shakhawat Hossain' => 'Assistant Professor & Co-Chairman',
            'Murshed Alam' => 'Assistant Professor & Chariman',

            //Mechanical
            'Iftekhar Mahmud' => 'Lecturer',
            'Tarazul Mulk Syed Anzam' => 'Assistant Professor & Chairman',

            //Civil
            'Md Abu Nayem' => 'Teaching Assistant',
            'Md. Emon Hossain' => 'Lecturer',
            'Md. Rejoan Chowdhury' => 'Lecturer',
            'Md. Ehasan kabir' => 'Lecturer',
            'Anisul Islam' => 'Lecturer',
            'Rubieyat Bin Ali' => 'Assistant Professor & Co-Chairman',
            'MD. Mofizul Islam' => 'Assistant Professor & Chairman',

            //EEE
            'Md. Rabban Khan' => 'Lecturer',
            'Abid Hasan' => 'Lecturer',
            'Salehin Kibria' => 'Lecturer',
            'Md. Hafizur Rahman' => 'Lecturer',
            'Md. Ibrahim Azad Tishad' => 'Lecturer',
            'Sajib Das' => 'Lecturer',
            'Engr. A.H.M. Delwar Haidar' => 'Professor',
            'Noor Md Shahriar' => 'Senior Lecturer & Co-Chairman',

            //CSE
            'Md Zahid Akon' => 'Teaching Assistant',
            'Md Shahin Hossen' => 'Lecturer',
            'Muntasir Rahman' => 'Lecturer',
            'Md. Mahadi Hasan Shaon' => 'Lecturer',
            'Md. Riadul Islam' => 'Lecturer',
            'Md. Masudur Rahman' => 'Lecturer',
            'Md. Tariqul Islam' => 'Lecturer',
            'Partho Sarathi Sarker' => 'Asst. Professor & Co-Chairman',
            'Md Abdur Razzak' => 'Senior Lecturer & Chairman',

        ];

        $counter = 0;
        foreach ($teachers as $key => $value) {

            $counter++;
            if ($counter == 1) {
                $dept=1;
            }
            elseif ($counter >= 2 && $counter <= 4) {
                $dept=2;
            }
            elseif ($counter >= 5 && $counter <= 6) {
                $dept=3;
            }
            elseif ($counter >= 7 && $counter <= 10) {
                $dept=4;
            }
            elseif ($counter >= 11 && $counter <= 18) {
                $dept=5;
            }
            elseif ($counter >= 19 && $counter <= 20) {
                $dept=6;
            }
            elseif ($counter >= 21 && $counter <= 27) {
                $dept=7;
            }
            elseif ($counter >= 28 && $counter <= 35) {
                $dept=8;
            }
            elseif ($counter >=36 && $counter <= 44) {
                $dept=9;
            }
            Teacher::create([
                'department_id' => $dept,
                'teacher_name' => $key,
                'slug' => Str::slug($key),
                'teacher_designation' => $value,
            ]);
        }
    }
}
