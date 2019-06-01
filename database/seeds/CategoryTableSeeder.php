<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = Category::create([
            'name'=>'Science Fiction',
            'active'=>1
        ]);

        $c2 = Category::create([
            'name'=>'Drama',
            'active'=>1
        ]);

        $c3 = Category::create([
            'name'=>'Romantic',
            'active'=>1
        ]);

        $c4 = Category::create([
            'name'=>'Horror',
            'active'=>1
        ]);

        $c5 = Category::create([
            'name'=>'Self Help',
            'active'=>1
        ]);

        $c6 = Category::create([
            'name'=>'Children',
            'active'=>1
        ]);

        $c7 = Category::create([
            'name'=>'History',
            'active'=>1
        ]);
    }
}
