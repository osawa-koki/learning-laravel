<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrefecturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prefectures = [
            [
                'id' => 1,
                'name' => '北海道',
                'capital' => '札幌市',
                'population' => 5_139_522,
                'area' => 78_420,
                'visited' => true,
            ],
            [
                'id' => 2,
                'name' => '青森県',
                'capital' => '青森市',
                'population' => 1_204_372,
                'area' => 9_645,
                'visited' => true,
            ],
            [
                'id' => 3,
                'name' => '岩手県',
                'capital' => '盛岡市',
                'population' => 1_180_512,
                'area' => 15_275,
                'visited' => false,
            ],
        ];
        foreach ($prefectures as $prefecture) {
            \App\Models\Prefecture::updateOrCreate(['id' => $prefecture['id']], $prefecture);
        }
    }
}
