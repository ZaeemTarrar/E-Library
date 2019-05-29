<?php

$argv;

class File
{
    public static function create($argv)
    {
        //print_r($argv[1]);
        $crud = $argv[1];
        $security = false;
        $methods = [];
        $gates = [];
        $access = [];

        $crud = explode('@', $crud);

        print_r($crud);

        if (isset($crud[1]) && strtolower($crud[1]) == 'secure') {
            $security = true;
        }

        if (isset($crud[2])) {
            $methods = explode(':', $crud[2]);
            print_r($methods);
            foreach ($methods as $key => $value) {
                $value = explode('+', $value);
                print_r($value);
                $gates[] = $value[0];
                $access[] = $value[1];
            }
        }

        $crud = $crud[0];

        $path = "app/Http/Controllers/";
        $myFile = $path . $crud . "Controller.php";
        // print_r($myFile);

        $stringData = "<?php
    namespace App\Http\Controllers;

    use Session;
    use Auth;
    use Storage;
    use App\\" . $crud . ";
    use App\Notification;
    use Illuminate\Http\Request;

    class " . $crud . "Controller extends Controller
    {
        ";

        if ($security) {
            $stringData .= "public function security(#!#access, #!#view)
            {
                #!#user = Auth::user()->role->access;
                if (#!#user != #!#access) {
                    #!#this->info_notice('You are Tres Passing You Limits .. Leave Now .. Or Pay the Price !');
                    return redirect()->route('dashboard');
                } else {
                    return #!#view;
                }
            }";
        }

        $stringData .= "
        public function index()
        {
            return
            ";
        if (in_array('index', $gates)) {
            $stringData .= " #!#this->security(
                " . $access[array_search('index', $gates)] . ",";
        }
        $stringData .= " view('dashboard." . strtolower($crud) . ".index')
                                            ->with('" . strtolower($crud) . "s', " . $crud . "::all())";
        if (in_array('index', $gates)) {
            $stringData .= " ) ";
        }
        $stringData .= ";
    }

    public function create()
    {
        return ";
        if (in_array('create', $gates)) {
            $stringData .= " $this->security(
                " . $access[array_search('create', $gates)] . ",";
        }
        $stringData .= " view('dashboard." . $crud . ".add')";
        if (in_array('create', $gates)) {
            $stringData .= " ) ";
        }
        $stringData .= ";
    }

    public function store(Request #!#request)
    {
        #!#this->sessionize(#!#request, [";

        for ($x = 2; $x < count($argv); $x++) {
            $data = explode('*', $argv[$x]);
            if ($x != 2) {
                $stringData .= ",";
            }
            $stringData .= "'" . $data[0] . "'";
        }

        $stringData .= "]);
            
            #!#this->validate(#!#request, [";

        $count = false;
        for ($x = 2; $x < count($argv); $x++) {
            $data = explode('*', $argv[$x]);
            if (isset($data[1])) {
                if ($count) {
                    $stringData .= ",";
                }
                $stringData .= "'" . $data[0] . "' => '" . str_replace('-', '|', $data[1]) . "' ";
                $count = true;
            } else {
                //$stringData .= "'" . $data[0] . "'";
            }
        }

        $stringData .= "]);

            #!#crud = new " . $crud . ";\n";

        for ($x = 2; $x < count($argv); $x++) {
            $data = explode('*', $argv[$x]);
            if (isset($data[2]) && $data[2] == 'logger') {
                $stringData .= "#!#crud->" . $data[0] . " = Auth::user()->id;\n";
            } else if (isset($data[2]) && $data[2] == 'image') {
                $stringData .= "#!#crud->" . $data[0] . " = #!#this->upload(#!#request, '" . strtolower($crud) . "', '" . $data[0] . "');";
            } else {
                $stringData .= "#!#crud->" . $data[0] . " = #!#request->" . $data[0] . ";\n";
            }
        }

        $stringData .= "#!#crud->save();";

        $stringData .= "#!#this->success_notice('New " . $crud . " Has Been Created Successfully !');

            return redirect()->route('" . strtolower($crud) . ".index');
        }

        public function show(#!#id)
        {
            //
        }

        public function edit(#!#id)
        {
            return ";
        if (in_array('edit', $gates)) {
            $stringData .= " #!#this->security(
                    " . $access[array_search('edit', $gates)] . ",";
        }
        $stringData .= " view('dashboard." . strtolower($crud) . ".edit')
                                            ->with('" . strtolower($crud) . "', " . $crud . "::find(#!#id))";
        if (in_array('edit', $gates)) {
            $stringData .= " ) ";
        }
        $stringData .= ";
        }

        public function update(Request #!#request, #!#id)
        {
            #!#this->sessionize(#!#request, [";

        for ($x = 2; $x < count($argv); $x++) {
            $data = explode('*', $argv[$x]);
            if ($x != 2) {
                $stringData .= ",";
            }
            $stringData .= "'" . $data[0] . "'";
        }

        $stringData .= "]);
            
            #!#this->validate(#!#request, [";

        $count = false;
        for ($x = 2; $x < count($argv); $x++) {
            $data = explode('*', $argv[$x]);

            if ($count) {
                $stringData .= ",";
            }
            if (isset($data[1])) {
                $a = explode('*', $data[0]);
                $stringData .= "'" . $data[0] . "' => '" . str_replace('-', '|', $data[1]) . "' ";
                $count = true;
            } else {
                //$stringData .= "'" . $data[0] . "'";
            }
        }

        $stringData .= "]);";

        $stringData .= "#!#crud = " . $crud . "::find(#!#id);";

        for ($x = 2; $x < count($argv); $x++) {
            $data = explode('*', $argv[$x]);
            if (isset($data[2]) && $data[2] == 'image') {
                $file = $data[0];
                $stringData .= "#!#tmp = false;
            if( trim( #!#request->" . $file . " ) != '' )
            {
                #!#this->remove(#!#crud->" . $file . ");
                #!#tmp = true;
            }
        ";
            }
        }

        for ($x = 2; $x < count($argv); $x++) {
            $data = explode('*', $argv[$x]);
            if (isset($data[2]) && $data[2] == 'logger') {
                $stringData .= "#!#crud->" . $data[0] . " = Auth::user()->id;\n";
            } else if (isset($data[2]) && $data[2] == 'image') {
                $stringData .= "if( #!#tmp ){
                #!#crud->" . $data[0] . " = #!#this->upload(#!#request, '" . strtolower($crud) . "', '" . strtolower($data[0]) . "');
                }";
            } else {
                $stringData .= "#!#crud->" . $data[0] . " = #!#request->" . $data[0] . ";\n";
            }
        }

        $stringData .= "#!#crud->save();";

        $stringData .= "#!#this->upgrade_notice('New " . $crud . " Has Been Created Successfully !');

return redirect()->route('" . strtolower($crud) . ".index');
}

public function destroy( #!#id)
{
" . $crud . "::find( #!#id)->delete();

    #!#this->error_notice('The " . $crud . " Has Been Deleted Successfully !');

return redirect()->route('" . strtolower($crud) . ".index');
}
}";

        $stringData = str_replace('#!#', '$', $stringData);

        $fh = fopen($myFile, 'w');

        $fh = fopen($myFile, 'w') or die("can't open file");

        fwrite($fh, $stringData);
        fclose($fh);
    }
}

File::create($argv);
