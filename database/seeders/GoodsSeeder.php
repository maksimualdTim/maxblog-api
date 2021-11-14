<?php

namespace Database\Seeders;

use App\Models\Goods;
use Illuminate\Database\Seeder;

class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Goods::factory()->count(100)->create();
    }
}
