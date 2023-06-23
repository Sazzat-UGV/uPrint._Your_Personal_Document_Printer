<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            DepartmentSeeder::class,
            TeacherSeeder::class,
            SemesterSeeder::class,
            SubjectSeeder::class,
            GeneralSettingSeeder::class,
            PagePriceSeeder::class,
        ]);
    }
}
