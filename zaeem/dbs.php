<?php

$argv;

class File
{
    public static function create($argv)
    {
        $path = "database/seeds/";

        $files = [];
        $it = new FilesystemIterator($path);
        foreach ($it as $fileinfo) {
            if (strtolower($fileinfo->getFilename()) != 'databaseseeder.php') {
                $file = $fileinfo->getFilename();
                $files[] = $file;
            }
        }

        $stringData = "<?php

        use Illuminate\Database\Seeder;
        
        class DatabaseSeeder extends Seeder
        {
            /**
             * Seed the application's database.
             *
             * @return void
             */
            public function run()
            {";

        foreach ($files as $key => $value) {
            $className = explode('.', $value);
            $stringData .= "#!#this->call(" . $className[0] . "::class);";
        }

        $stringData .= "}
        }
        ";

        $stringData = str_replace('#!#', '$', $stringData);

        $myFile = $path . 'DatabaseSeeder.php';

        $fh = fopen($myFile, 'w');

        $fh = fopen($myFile, 'w') or die("can't open file");

        fwrite($fh, $stringData);
        fclose($fh);
    }
}

File::create($argv);
