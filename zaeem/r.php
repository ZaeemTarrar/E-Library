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
        $stringData = "";
        $routes = "";
        $path = "routes/";
        $myFile = $path . "web.php";
        // $fh = fopen($myFile, 'w');

        $file = file_get_contents($myFile);

        // $file = explode('## Route', $file);

        if ($argv[1] == 'site') {
            $route = explode(':', $argv[2]);
            if ($route[0] == 'get' && isset($route[1])) {
                $routes = "Route::get('/" . strtolower($route[1]) . "','FrontController@" . strtolower($route[2]) . "')->name('" . strtolower($route[3]) . "');";
                $file = str_replace('## New Route Here', $routes . '
                
                ## Route
                ## New Route Here', $file);
            } else if ($route[0] == 'resource' && isset($route[1])) {
                $routes = "Route::resource('" . strtolower($route[1]) . "','" . ucfirst($route[1]) . "Controller');";
                $file = str_replace('## New Route Here', $routes . '
                
                ## Route
                ## New Route Here', $file);
            } else { }
        } else if ($argv[1] == 'dashboard') {
            $route = explode(':', $argv[2]);
            if ($route[0] == 'get' && isset($route[1])) {
                $routes = "Route::get('" . strtolower($route[1]) . "','" . ucfirst($route[1]) . "Controller@" . strtolower($route[2]) . "')->name('" . strtolower($route[3]) . "');";
                $file = str_replace('###  New Route Here', $routes . '
                
                ###  Route
                ###  New Route Here', $file);
            } else if ($route[0] == 'resource' && isset($route[1])) {
                $routes = "Route::resource('" . strtolower($route[1]) . "','" . ucfirst($route[1]) . "Controller');";
                $file = str_replace('###  New Route Here', $routes . '
                
                ###  Route
                ###  New Route Here', $file);
            } else { }
        } else if ($argv[1] == 'reset') {
            $file = "<?php

             /*
             |--------------------------------------------------------------------------
             | Web Routes
             |--------------------------------------------------------------------------
             |
             | Here is where you can register web routes for your application. These
             | routes are loaded by the RouteServiceProvider within a group which
             | contains the \" web \" middleware group. Now create something great!
             |
             */
             
             Auth::routes();

             ## Route
             Route::get('/', function(){
                return redirect('/home');
             });
             
             ## Route
             Route::get('/sample', 'FrontController@sample')->name('sample');
             
             ## Route
             ## New Route Here
             
             Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
             
                 ###  Route
                 Route::get('/', 'DashboardController@index')->name('dashboard');
             
                 ###  Route
                 ###  New Route Here
             });
             ";
        } else { }

        // Site Add

        // Site

        if ($argv[1] == 'site') {
            $route = explode(':', $argv[2]);
            $theRoutes = explode('## Route', $file);
            $searchRoute = [];
            $myRoutes = "";
            if (strtolower($route[0]) == 'get') {
                for ($z = 1; $z < count($theRoutes) - 1 && count($theRoutes) >= 2; $z++) {
                    //print_r(File::search('get', 'hello get oye'));
                    if (File::search('get', trim(strtolower($theRoutes[$z]))) != false) {
                        $searchRoute[] = trim($theRoutes[$z]);
                    }
                }
                if (count($searchRoute) > 0) {
                    print_r($searchRoute);
                }
            } else if (strtolower($route[0]) == 'resource') {
                for ($z = 1; $z < count($theRoutes) - 1 && count($theRoutes) >= 2; $z++) {
                    if (File::search('resource', trim(strtolower($theRoutes[$z]))) != false) {
                        $searchRoute[] = trim($theRoutes[$z]);
                    }
                }
                if (count($searchRoute) > 0) {
                    print_r($searchRoute);
                }
            } else if ($route[0] == 'all') {
                for ($z = 1; $z < count($theRoutes) - 1 && count($theRoutes) >= 2; $z++) {
                    $searchRoute[] = trim($theRoutes[$z]);
                }
                if (count($searchRoute) > 0) {
                    print_r($searchRoute);
                }
            } else { }
        } else if ($argv[1] == 'dashboard') {
            $route = explode(':', $argv[2]);
            $theRoutes = explode('###  Route', $file);
            $searchRoute = [];
            $myRoutes = "";
            if (strtolower($route[0]) == 'get') {
                for ($z = 1; $z < count($theRoutes) - 1 && count($theRoutes) >= 2; $z++) {
                    //print_r(File::search('get', 'hello get oye'));
                    if (File::search('get', trim(strtolower($theRoutes[$z]))) != false) {
                        $searchRoute[] = trim($theRoutes[$z]);
                    }
                }
                if (count($searchRoute) > 0) {
                    print_r($searchRoute);
                }
            } else if (strtolower($route[0]) == 'resource') {
                for ($z = 1; $z < count($theRoutes) - 1 && count($theRoutes) >= 2; $z++) {
                    if (File::search('resource', trim(strtolower($theRoutes[$z]))) != false) {
                        $searchRoute[] = trim($theRoutes[$z]);
                    }
                }
                if (count($searchRoute) > 0) {
                    print_r($searchRoute);
                }
            } else if ($route[0] == 'all') {
                for ($z = 1; $z < count($theRoutes) - 1 && count($theRoutes) >= 2; $z++) {
                    $searchRoute[] = trim($theRoutes[$z]);
                }
                if (count($searchRoute) > 0) {
                    print_r($searchRoute);
                }
            } else { }
        }

        // add Site

        $fh = fopen($myFile, 'w') or die("can't open file");

        $stringData = str_replace('#!#', '$', $stringData);

        fwrite($fh, $file);
        fclose($fh);
    }
}

File::set($argv);
