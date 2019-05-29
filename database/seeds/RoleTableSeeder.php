<?php

        use Illuminate\Database\Seeder;
        
        class RoleTableSeeder extends Seeder
        {
            /**
             * Run the database seeds.
             *
             * @return void
             */
            public function run()
            { $seed1 = new App\Role; $seed1->name = 'admin'; $seed1->access = 0; $seed1->save(); $seed2 = new App\Role; $seed2->name = 'student'; $seed2->access = 1; $seed2->save();}
        }
        