<?php

use Illuminate\Database\Seeder;
use App\Grade;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g1 = Grade::create([
            'name' => 'A',
            'active' => 1
        ]);

        $g2 = Grade::create([
            'name' => 'B',
            'active' => 1
        ]);

        $g3 = Grade::create([
            'name' => 'C',
            'active' => 1
        ]);
    }
}
