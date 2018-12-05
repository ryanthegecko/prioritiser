<?php

use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('sectors')->insert([
                    'title' => 'Personal',
                    'weight' => 0
                ]);
                DB::table('sectors')->insert([
                    'title' => 'Social',
                    'weight' => 0
                ]);
                DB::table('sectors')->insert([
                    'title' => 'Practical',
                    'weight' => 0
                ]);
                DB::table('sectors')->insert([
                    'title' => 'Moral',
                    'weight' => 0
                ]);
                DB::table('sectors')->insert([
                    'title' => 'Lifestyle',
                    'weight' => 0
                ]);
    }
}
