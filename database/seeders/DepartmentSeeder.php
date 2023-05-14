<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $departments=[
        'Social Science',
        'Mathematics',
        'Physics & Astronomy',
        'English',
        'Business Administration',
        'Mechanical',
        'Civil',
        'EEE',
        'CSE',
       ];

       foreach($departments as $department){
        Department::create([
            'name'=>$department,
            'slug'=>Str::slug($department)
        ]);
       }
    }
}
