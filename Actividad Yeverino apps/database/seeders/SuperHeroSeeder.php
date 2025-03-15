<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperHeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Superheroe::create([
            'DC'=>'Batman'
        ]);
        Superheroe::create([
            'TheBoys'=>'Patriota'
        ]);
    }
}
