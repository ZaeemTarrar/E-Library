<?php

$argv;

class File
{
    public static function del($argv)
    {
        $controller = "app/Http/Controllers/";
        $dashboard = "resources/views/dashboard/";
        $site = "resources/views/site/";
        $migration = "database/migrations/";
        $model = "app/";
        $seed = "database/seeds/";
        $gallery = "storage/app/public/";

        $search = 'mainmenu';
        $it = new FilesystemIterator($gallery);
        foreach ($it as $fileinfo) {
            if (true) {
                $path = $gallery . $fileinfo->getFilename();
                print_r($path, '
                ');
                if (is_dir($path)) {
                    $it2 = new FilesystemIterator($path);
                    foreach ($it2 as $fileinfo2) {
                        if (true) {
                            $path2 = $path . '/' . $fileinfo2->getFilename();
                            print_r($path2 . '
');
                            unlink($path2);
                        }
                    }
                    rmdir($path);
                } else { }
            }
        }


        ///////////////////

        $search = 'mainmenu';
        $it = new FilesystemIterator($seed);
        foreach ($it as $fileinfo) {
            // print_r($fileinfo->getFilename() );
            $file = $fileinfo->getFilename();
            if (
                $file == "DatabaseSeeder.php"
                || $file == "NotificationtypeTableSeeder.php"
                || $file == "UserTableSeeder.php"
                || $file == "RoleTableSeeder.php"
            ) {
                $path = $seed . $fileinfo->getFilename();
                //print_r('hellp', '');
            } else {
                // print_r($seed . $file . '
                // ');
                $path = $seed . $file;
                unlink($path);
            }
        }

        ///////////////////

        $search = 'mainmenu';
        $it = new FilesystemIterator($controller);
        foreach ($it as $fileinfo) {
            // print_r($fileinfo->getFilename() );
            $file = $fileinfo->getFilename();

            if (!is_dir($controller . $file)) {
                if (($file == "Controller.php" || $file == "DashboardController.php" || $file == "FrontController.php")) {
                    //$path = $controller . $fileinfo->getFilename();
                    //print_r('hellp', '');
                    //print_r($controller . $file . '
                    //');
                } else {
                    // print_r($controller . $file . '
                    // ');
                    $path = $controller . $file;
                    unlink($path);
                }
            }
        }

        ///////////////////

        $search = 'mainmenu';
        $it = new FilesystemIterator($model);
        foreach ($it as $fileinfo) {
            // print_r(strtolower($fileinfo->getFilename()) . '
            // ');
            $file = $fileinfo->getFilename();
            if (strpos(strtolower($file), 'lib') !== false) { } else {
                if (!is_dir($model . $file)) {
                    if (
                        strtolower($file) != 'notification.php'
                        && strtolower($file) != 'notificationtype.php'
                        && strtolower($file) != 'role.php'
                        && strtolower($file) != 'user.php'
                    ) {
                        print_r(strtolower($file) . '
                    ');
                        $path = $model . $file;
                        unlink($path);
                    }
                }
            }
        }

        $search = 'mainmenu';
        $it = new FilesystemIterator($migration);
        foreach ($it as $fileinfo) {
            // print_r(strtolower($fileinfo->getFilename()) . '
            // ');
            $file = $fileinfo->getFilename();
            if (
                strpos(strtolower($file), 'create_users') !== false
                || strpos(strtolower($file), 'create_password') !== false
                || strpos(strtolower($file), 'create_roles') !== false
                || strpos(strtolower($file), 'create_notificationtypes') !== false
                || strpos(strtolower($file), 'create_notifications') !== false
            ) { } else {
                // print_r(strtolower($migration . $file) . '
                //     ');
                if (!is_dir($migration . $file)) {
                    // if (
                    //     strtolower($file) != 'notification.php'
                    //     && strtolower($file) != 'notificationtype.php'
                    //     && strtolower($file) != 'role.php'
                    //     && strtolower($file) != 'user.php'
                    // ) {
                    //     print_r(strtolower($file) . '
                    // ');
                    //     $path = $migration . $file;
                    //     //unlink($path);
                    // }
                    unlink($migration . $file);
                }
            }
        }

        ///////////////////

        $search = 'mainmenu';
        $it = new FilesystemIterator($dashboard);
        foreach ($it as $fileinfo) {
            // print_r(strtolower($fileinfo->getFilename()) . '
            // ');
            $file = $fileinfo->getFilename();

            if (is_dir($dashboard . $file)) {
                //     print_r(strtolower($file) . '
                // ');
                $path = $dashboard . $file;
                $it2 = new FilesystemIterator($path);
                foreach ($it2 as $fileinfo2) {
                    // print_r(strtolower($fileinfo->getFilename()) . '
                    // ');
                    $file2 = $fileinfo2->getFilename();
                    //         print_r($path . '/' . $file2 . '
                    // ');
                    unlink($path . '/' . $file2);
                }
                rmdir($path);
            }
        }

        $search = 'mainmenu';
        $it = new FilesystemIterator($site);
        foreach ($it as $fileinfo) {
            // print_r(strtolower($fileinfo->getFilename()) . '
            // ');
            $file = $fileinfo->getFilename();

            if (is_dir($site . $file)) {
                //     print_r(strtolower($file) . '
                // ');
                $path = $site . $file;
                $it2 = new FilesystemIterator($path);
                foreach ($it2 as $fileinfo2) {
                    // print_r(strtolower($fileinfo->getFilename()) . '
                    // ');
                    $file2 = $fileinfo2->getFilename();
                    //         print_r($path . '/' . $file2 . '
                    // ');
                    unlink($path . '/' . $file2);
                }
                rmdir($path);
            }
        }

        // $search = 'mainmenu';
        // $it = new FilesystemIterator($gallery);
        // foreach ($it as $fileinfo) {
        //     if (strtolower($fileinfo->getFilename()) != 'controller') {
        //         rmdir($gallery . $fileinfo->getFilename());
        //     }
        // }

        // $myFile = $path . $crud . "Controller.php";
        // $fh = fopen($myFile, 'w');

        // $fh = fopen($myFile, 'w') or die("can't open file");

        // $stringData = str_replace('#!#', '$', $stringData);

        // fwrite($fh, $stringData);
        // fclose($fh);
    }
}

File::del($argv);
