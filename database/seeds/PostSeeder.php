<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('posts')->insert([
           ['user_id' => 1,'title'=>"Post 4",'content'=>"Post 4 content"],
           ['user_id' => 1,'title'=>"Post 5",'content'=>"Post 5 content"],
           ['user_id' => 1,'title'=>"Post 6",'content'=>"Post 6 content"],

       ]);
        
    }
}
