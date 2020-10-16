<?php

use Illuminate\Database\Seeder;

class GoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals')->insert([
            'title' => 'Make prioritiser',
            'user_id' => 1,
            'completed' => false
        ]);

        DB::table('goals')->insert([
            'title' => 'Use prioritiser',
            'user_id' => 1,
            'completed' => false
        ]);

        DB::table('goals')->insert([
            'title' => 'Learn Spanish',
            'user_id' => 1,
            'completed' => false
        ]);

        DB::table('goals')->insert([
            'title' => 'Call mum',
            'user_id' => 1,
            'completed' => false
        ]);

        DB::table('goals')->insert([
            'title' => '600 push ups a day',
            'user_id' => 1,
            'completed' => false
        ]);

        DB::table('goals')->insert([
            'title' => 'Learn Vue.js',
            'user_id' => 1,
            'completed' => false
        ]);

        DB::table('goals')->insert([
            'title' => 'Learn D3.js',
            'user_id' => 1,
            'completed' => false
        ]);
    }
}
