<?php

        use Illuminate\Database\Seeder;
        
        class NotificationtypeTableSeeder extends Seeder
        {
            /**
             * Run the database seeds.
             *
             * @return void
             */
            public function run()
            { $seed1 = new App\Notificationtype; $seed1->name = 'default'; $seed1->save(); $seed2 = new App\Notificationtype; $seed2->name = 'success'; $seed2->save(); $seed3 = new App\Notificationtype; $seed3->name = 'error'; $seed3->save(); $seed4 = new App\Notificationtype; $seed4->name = 'upgrade'; $seed4->save(); $seed5 = new App\Notificationtype; $seed5->name = 'info'; $seed5->save();}
        }
        