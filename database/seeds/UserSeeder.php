<?php
namespace Database\Seeds;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'email' => 'yassminediab1996@gmail.com',
            'password' => bcrypt('123456'),
            'name' => 'Yassmine Diab'
        ]);
    }
}
