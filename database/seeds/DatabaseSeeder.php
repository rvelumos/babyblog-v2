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
         //$this->call(UsersTableSeeder::class);

         DB::statement('SET FOREIGN_KEY_CHECKS=0');
         DB::table('users')->truncate();

         factory(App\User::class, 25)->create()->each(function($user){
        
                $user->posts()->save(factory(App\Post::class)->make());

          //  $user->posts()->save(factory(App\Post::class)->make());
         });

         factory(App\Role::class, 2)->create();
         //factory(App\Category::class, 25)->create();
         factory(App\Photo::class, 1)->create();

      //   factory(App\Comment::class, 25)->create()-each(function($c){
      //       $c->replies()->save(factory(App\CommentReply::class)->make());
      //   });

    }
}
