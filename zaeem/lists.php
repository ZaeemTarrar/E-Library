<?php

$argv;

class File
{
    public static function create($name, $level)
    {
        $path = $name;

        //$files = [];
        $it = new FilesystemIterator($path);
        foreach ($it as $fileinfo) {
            if (strtolower($fileinfo->getFilename()) != 'databaseseeder.php') {
                $file = $fileinfo->getFilename();
                //$files[] = $file;
                if (is_dir($path . '/' . $file)) {
                    print_r('
');
                    for ($x = 0; $x < $level; $x++) {
                        print_r('    ');
                    }
                    print_r('=> ' . $file);
                    File::create($path . '/' . $file, $level + 1);
                } else {
                    print_r('
');
                    for ($x = 0; $x < $level; $x++) {
                        print_r('    ');
                    }
                    print_r($file);
                }
            }
        }
        print_r('
');

        // $stringData = str_replace('#!#', '$', $stringData);

        // $myFile = $path . 'DatabaseSeeder.php';

        // $fh = fopen($myFile, 'w');

        // $fh = fopen($myFile, 'w') or die("can't open file");

        // fwrite($fh, $stringData);
        // fclose($fh);
    }

    public static function controllers($name, $level)
    {
        $path = $name;

        //$files = [];
        $it = new FilesystemIterator($path);
        foreach ($it as $fileinfo) {
            if (strtolower($fileinfo->getFilename()) != 'databaseseeder.php') {
                $file = $fileinfo->getFilename();
                //$files[] = $file;
                if (is_dir($path . '/' . $file)) {
                    print_r('
');
                    for ($x = 0; $x < $level; $x++) {
                        print_r('    ');
                    }
                    print_r('=> ' . $file);
                    File::controllers($path . '/' . $file, $level + 1);
                } else {
                    print_r('
');
                    for ($x = 0; $x < $level; $x++) {
                        print_r('    ');
                    }
                    print_r($file);
                }
            }
        }
        print_r('
');

        // $stringData = str_replace('#!#', '$', $stringData);

        // $myFile = $path . 'DatabaseSeeder.php';

        // $fh = fopen($myFile, 'w');

        // $fh = fopen($myFile, 'w') or die("can't open file");

        // fwrite($fh, $stringData);
        // fclose($fh);
    }

    public static function models($name, $level)
    {
        $path = $name;

        //$files = [];
        $it = new FilesystemIterator($path);
        foreach ($it as $fileinfo) {
            if (strtolower($fileinfo->getFilename()) != 'library_form.php' && strtolower($fileinfo->getFilename()) != 'library_table.php') {
                $file = $fileinfo->getFilename();
                //$files[] = $file;
                if (is_dir($path . '/' . $file)) {
                    //                     print_r('
                    // ');
                    //                     for ($x = 0; $x < $level; $x++) {
                    //                         print_r('    ');
                    //                     }
                    //                     print_r('=> ' . $file);
                    // File::models($path . '/' . $file, $level + 1);
                } else {
                    print_r('
');
                    for ($x = 0; $x < $level; $x++) {
                        print_r('    ');
                    }
                    print_r($file);
                }
            }
        }
        print_r('
');

        // $stringData = str_replace('#!#', '$', $stringData);

        // $myFile = $path . 'DatabaseSeeder.php';

        // $fh = fopen($myFile, 'w');

        // $fh = fopen($myFile, 'w') or die("can't open file");

        // fwrite($fh, $stringData);
        // fclose($fh);
    }

    public static function migrations($name, $level)
    {
        $path = $name;

        //$files = [];
        $it = new FilesystemIterator($path);
        foreach ($it as $fileinfo) {
            if (strtolower($fileinfo->getFilename()) != 'databaseseeder.php') {
                $file = $fileinfo->getFilename();
                //$files[] = $file;
                if (is_dir($path . '/' . $file)) {
                    print_r('
');
                    for ($x = 0; $x < $level; $x++) {
                        print_r('    ');
                    }
                    print_r('=> ' . $file);
                    File::migrations($path . '/' . $file, $level + 1);
                } else {
                    print_r('
');
                    for ($x = 0; $x < $level; $x++) {
                        print_r('    ');
                    }
                    print_r($file);
                }
            }
        }
        print_r('
');

        // $stringData = str_replace('#!#', '$', $stringData);

        // $myFile = $path . 'DatabaseSeeder.php';

        // $fh = fopen($myFile, 'w');

        // $fh = fopen($myFile, 'w') or die("can't open file");

        // fwrite($fh, $stringData);
        // fclose($fh);
    }

    public static function views($name, $level)
    {
        $path = $name;

        //$files = [];
        $it = new FilesystemIterator($path);
        foreach ($it as $fileinfo) {
            if (
                strtolower($fileinfo->getFilename()) != 'original_dashboard' && strtolower($fileinfo->getFilename()) != 'original_site'
            ) {
                $file = $fileinfo->getFilename();
                //$files[] = $file;
                if (is_dir($path . '/' . $file)) {
                    print_r('
');
                    for ($x = 0; $x < $level; $x++) {
                        print_r('    ');
                    }
                    print_r('=> ' . $file);
                    File::views($path . '/' . $file, $level + 1);
                } else {
                    print_r('
');
                    for ($x = 0; $x < $level; $x++) {
                        print_r('    ');
                    }
                    print_r($file);
                }
            }
        }

        // $stringData = str_replace('#!#', '$', $stringData);

        // $myFile = $path . 'DatabaseSeeder.php';

        // $fh = fopen($myFile, 'w');

        // $fh = fopen($myFile, 'w') or die("can't open file");

        // fwrite($fh, $stringData);
        // fclose($fh);
    }
}

if (isset($argv[2]) && $argv[2] == 'controller') {
    File::create($argv[1], 1);
} else if (isset($argv[2]) && $argv[2] == 'model') {
    File::models($argv[1], 1);
} else if (isset($argv[2]) && $argv[2] == 'migration') {
    File::create($argv[1], 1);
} else if (isset($argv[2]) && $argv[2] == 'view') {
    File::views($argv[1], 1);
} else {
    File::create($argv[1], 1);
}
