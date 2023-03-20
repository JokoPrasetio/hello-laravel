<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\post;
use App\Models\category;
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
        // \App\Models\User::factory(10)->create();


        User::create([
            'name' => 'joko prasetio',
            'username'=> 'joko12tio',
            'email' => 'joko12prasetio@gmail.com',
            'password' => bcrypt('12345')

        ]);
        User::factory(1)->create();
        post::factory(3)->create();
        category::factory(2)->create();
    }
}
