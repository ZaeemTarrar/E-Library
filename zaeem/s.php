<?php

$argv;

class File
{
    public static function create($argv)
    {
        $path = "database/seeds/";
        $name = $argv[1];

        $myFile = $path . ucfirst($name) . 'TableSeeder.php';

        $stringData = "<?php

        use Illuminate\Database\Seeder;
        
        class " . ucfirst($name) . "TableSeeder extends Seeder
        {
            /**
             * Run the database seeds.
             *
             * @return void
             */
            public function run()
            {";

        for ($x = 2; $x < count($argv); $x++) {
            $stringData .= " #!#seed" . ($x - 1) . " = new App\\" . ucfirst($name) . ";";
            $seeds = explode(':', $argv[$x]);
            foreach ($seeds as $key => $value) {
                $value = explode('=', $value);
                $stringData .= " #!#seed" . ($x - 1) . "->" . strtolower($value[0]) . " = ";
                if (isset($value[1]) && $value[1] == 'i') {
                    if (isset($value[2])) {
                        $stringData .= $value[2] . ";";
                    }
                } else if (isset($value[1]) && $value[1] == 's') {
                    if (isset($value[2])) {
                        $stringData .= "'" . $value[2] . "';";
                    }
                } else if (isset($value[1]) && $value[1] == 'b') {
                    if (isset($value[2])) {
                        $stringData .= $value[2] . ";";
                    }
                } else if (isset($value[1]) && $value[1] == 'd') {
                    if (true) {
                        $stringData .= "date('Y-m-d')" . ";";
                    }
                } else if (isset($value[1]) && $value[1] == 'p') {
                    if (isset($value[2])) {
                        $stringData .= "bcrypt('" . $value[2] . "')" . ";";
                    }
                }
            }
            $stringData .= " #!#seed" . ($x - 1) . "->save();";
        }

        $stringData .= "}
        }
        ";
        $stringData = str_replace('#!#', '$', $stringData);
        //print_r($stringData);
        $fh = fopen($myFile, 'w');

        $fh = fopen($myFile, 'w') or die("can't open file");

        fwrite($fh, $stringData);
        fclose($fh);
    }
}

File::create($argv);
