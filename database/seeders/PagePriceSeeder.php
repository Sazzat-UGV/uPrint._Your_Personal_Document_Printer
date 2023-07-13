<?php

namespace Database\Seeders;

use App\Models\PagePrice;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PagePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paperType=[
            'Assignment Cover Page',
            'Educational Document',
            'University Document',
        ];

        foreach($paperType as $type){
            PagePrice::updateOrCreate([
                'paper_type'=>$type,
                'paper_slug'=>Str::slug($type),
                'paper_price'=>5,
                'show_on_hompage'=>1,
            ]);
        }

    }
}

