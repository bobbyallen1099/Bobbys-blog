<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach(range(1, 30) as $index) {
            DB::table('posts')->insert([
                'title' => Str::random(10),
                'body' =>  Str::random(10),
                'slug' =>  Str::random(10)
            ]);
        }
    }
}
