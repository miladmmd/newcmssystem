<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(100)->create(); 
        // DB:table('users')->insert([

        // ]);
        // factory(User::class,10) -> create();

        // \App\Models\User::factory(2)->create()->each(function($user){
        //     // $user->posts()->save(factory('App\Models\Post')->make());
        //     //   $user->posts()->save(\App\Models\Post::factory()->make());
        //       \App\Models\Post::factory(10)->create(['user_id'=>$user->id]);
        // });
         
    }
}
