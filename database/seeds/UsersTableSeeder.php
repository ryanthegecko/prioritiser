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
            'username' => 'ryan',
            'email' => 'ryanthegecko@gmail.com',
            'password' => bcrypt('Pri_c2348x'),
        ]);
        DB::table('users')->insert([
            'username' => 'erin',
            'email' => 'erin.slra@yahoo.co.uk',
            'password' => bcrypt('123456Hi'),
        ]);
    }
}
