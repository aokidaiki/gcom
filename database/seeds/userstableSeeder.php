<?php

use Illuminate\Database\Seeder;

class userstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'まさなお',
            'email' => 'aoki@gmail',
            'password' => 'daiki'],
            ['name' => '爽',
            'email' => 'aoiki@gmail',
            'password' => 'daiki'],
            ['name' => '花屋',
            'email' => 'hanaya@gmail',
            'password' => 'daiki'],
            ['name' => 'だいき',
            'email' => 'daiki@gmail',
            'password' => 'hirose@gmail'],
        ]);
    }
}
