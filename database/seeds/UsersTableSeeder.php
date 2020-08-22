<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
        
            'name' => Str::random(12),
            'role_id' => 2,
            'is_active' => 1,
            'email' => Str::random(8).'@gmail.com',
            'password' => bcrypt('secret')
        ]);
    }
}
