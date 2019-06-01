<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $l1 = Language::create([
            'name' => 'English',
            'active' => 1
       ]);

       $l2 = Language::create([
            'name' => 'French',
            'active' => 1
        ]);
        $l3 = Language::create([
            'name' => 'Dutch',
            'active' => 1
        ]);
        $l4 = Language::create([
            'name' => 'Urdu',
            'active' => 1
        ]);
        $l5 = Language::create([
            'name' => 'Russian',
            'active' => 1
        ]);

    }
}
