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
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@matsura123123.titi',
            'password' => bcrypt('adminadmin'),
            'role' => 'admin',
            'image' => 'img/uploads/default.jpg',
        ]);
    }
}
