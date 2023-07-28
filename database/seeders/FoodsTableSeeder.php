<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            [
                'id' => 1,
                'name' => '札幌ラーメン',
                'prefecture_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'ジンギスカン',
                'prefecture_id' => 1,
            ],
            [
                'id' => 3,
                'name' => '海鮮丼',
                'prefecture_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'のっけ丼',
                'prefecture_id' => 2,
            ],
            [
                'id' => 5,
                'name' => 'りんご',
                'prefecture_id' => 3,
            ],
        ];

        foreach ($foods as $food) {
            \App\Models\Food::updateOrCreate(['id' => $food['id']], $food);
        }
    }
}
