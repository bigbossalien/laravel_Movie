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
       DB::table('lrv12_users')->insert([
            'username' => 'Super Admin',
            'email' => 'dovanchieu95@gmail.com',
            'password' => bcrypt('superadmin'),
            'birthday' => '1995-2-1', 
            'sex' => 'nam',
            'level' => 0,
            'status' => 1,
            'avata' => 'user_avata.png',
            'created_at' => new DateTime(),
       ]);
    }
}
