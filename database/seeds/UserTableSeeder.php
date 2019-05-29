<?php

        use Illuminate\Database\Seeder;
        
        class UserTableSeeder extends Seeder
        {
            /**
             * Run the database seeds.
             *
             * @return void
             */
            public function run()
            { $seed1 = new App\User; $seed1->name = 'zaeem'; $seed1->password = bcrypt('123456'); $seed1->email = 'zaeemtarrar3@gmail.com'; $seed1->role_id = 1; $seed1->save();}
        }
        