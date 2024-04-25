<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        \App\Models\User::factory(20)->create();
        \App\Models\Post::factory(5)->create(["user_id"=>2]);

    }
}
