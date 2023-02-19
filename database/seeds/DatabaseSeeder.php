<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([\Database\Seeds\UserSeeder::class, \Database\Seeds\ProductTypeSeeder::class, \Database\Seeds\ProductSeeder::class]);
    }
}
