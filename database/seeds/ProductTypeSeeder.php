<?php
namespace Database\Seeds;

use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\ProductType::insert([[
            'type' => 'item',
        ],  [
            'type' => 'service',
        ]]);
    }
}
