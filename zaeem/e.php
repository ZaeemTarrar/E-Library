<?php

$argv;

class File
{
    public static function create($argv)
    {
        $database = $argv[1];

        $myFile = ".env";

        $stringData = "APP_NAME=Laravel
        APP_ENV=local
        APP_KEY=base64:FnKHzbWdaf2/wizz2zdvhUY4FFbtgeRW+Mf9QLKp4Mk=
        APP_DEBUG=true
        APP_LOG_LEVEL=debug
        APP_URL=http://localhost
        
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=" . $database . "
        DB_USERNAME=root
        DB_PASSWORD=
        
        BROADCAST_DRIVER=log
        CACHE_DRIVER=file
        SESSION_DRIVER=file
        QUEUE_DRIVER=sync
        
        REDIS_HOST=127.0.0.1
        REDIS_PASSWORD=null
        REDIS_PORT=6379
        
        MAIL_DRIVER=smtp
        MAIL_HOST=smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=null
        MAIL_PASSWORD=null
        MAIL_ENCRYPTION=null
        
        PUSHER_APP_ID=
        PUSHER_APP_KEY=
        PUSHER_APP_SECRET=
        ";

        //$stringData = str_replace('#!#', '$', $stringData);

        $fh = fopen($myFile, 'w');

        $fh = fopen($myFile, 'w') or die("can't open file");

        fwrite($fh, $stringData);
        fclose($fh);
    }
}

File::create($argv);
