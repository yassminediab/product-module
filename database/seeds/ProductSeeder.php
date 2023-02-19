<?php
namespace Database\Seeds;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::first();
        $itemType = \App\ProductType::where('type' , 'item')->first();
        \App\Product::create([
            'name' => 'Test Product Name',
            'price' => 100,
            'status' => 1,
            'user_id' => $user->id,
            'product_type_id' => $itemType->id
        ]);
    }
}
