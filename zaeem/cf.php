<?php

$argv;

class File
{
    public static function search($search, $text)
    {
        $index = [];
        $check = 0;
        for ($x = 0; $x < strlen($text); $x++) {
            if ($search[0] == $text[$x]) {
                for ($y = 0; $y < strlen($search); $y++) {
                    if ($search[$y] == $text[$x + $y]) {
                        $check++;
                    } else { }
                }

                if (strlen($search) == $check) {
                    $index[] = $x;
                }
            }
        }
        return $index;
    }
    public static function set($argv)
    {
        $file = "";
        $stringData = "";
        $routes = "";
        $path = "app/Http/Controllers/";
        $myFile = $path . "FrontController.php";
        // $fh = fopen($myFile, 'w');
        if ($argv[1] != 'reset') {

            $method_name = $argv[1];
            $method_names = explode(':', $method_name);
            $page_path = $argv[2];
            $page_paths = explode(':', $page_path);

            foreach ($method_names as $k => $v) {
                $stringData = "
            public function " . $v . "()
            {
                return view('front." . $page_paths[$k] . "');
            }

            ### Method
            ### New Method
        ";
                $file = file_get_contents($myFile);

                $file = str_replace('### New Method', $stringData, $file);

                $fh = fopen($myFile, 'w') or die("can't open file");

                $file = str_replace('#!#', '$', $file);

                fwrite($fh, $file);
                fclose($fh);
            }
        } else {
            $file = "<?php

            namespace App\Http\Controllers;
            
            use Illuminate\Http\Request;
            
            class FrontController extends Controller
            {
                public function sample()
                {
                    return view('front.sample');
                }
            
                ### Method
                ### New Method
            
            }
            ";

            $fh = fopen($myFile, 'w') or die("can't open file");

            $file = str_replace('#!#', '$', $file);

            fwrite($fh, $file);
            fclose($fh);
        }
    }
}

File::set($argv);
