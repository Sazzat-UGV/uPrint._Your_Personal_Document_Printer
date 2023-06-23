<?php

namespace Database\Seeders;

use App\Models\PagePrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        PagePrice::updateOrCreate([
            'paper_type'=>'Black & White',
            'paper_price'=>5,
            'show_on_hompage'=>1,
        ]);

        PagePrice::updateOrCreate([
            'paper_type'=>'Color',
            'paper_price'=>5,
            'show_on_hompage'=>0,
        ]);
    }
}

