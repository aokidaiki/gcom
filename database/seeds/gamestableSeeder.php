<?php

use Illuminate\Database\Seeder;


class gamestableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            ['games_title' => 'Pokemonn'],
            ['games_title' => 'Sumabura'],
            ['games_title' => 'Fortnite'],
            ['games_title' => 'Splatoon'],
            ['games_title' => 'Apex Legends'],
            ['games_title' => 'NBA2K'],
        ]);
    }
}
