<?php

$argv;

class File
{
    public static function image_url()
    {
        return 'http://localhost/myCmd/storage/app/public/';
    }

    public static function create($argv)
    {
        $path = "resources/views";

        $tmp_file = "";
        $dir = explode('/', $argv[2]);
        // print_r($argv[1]);

        // print_r($dir);
        for ($x = 0; $x < count($dir) - 1; $x++) {
            // print_r('DIR:
            // ' . $path . $argv[1] . $dir[$x] . '
            // ');
            if (!is_dir($path . $argv[1] . $dir[$x])) {
                mkdir($path . $argv[1] . $dir[$x], 0755);
            }
        }

        // print_r('Cleared
        // ');

        $tmp_file = $dir[count($dir) - 1];

        // print_r('Temp: ' . $tmp_file . '
        // ');

        $myFile = $path . $argv[1] . $argv[2] . ".blade.php";

        // print_r('File: ' . $myFile . '
        // ');

        // print_r('Form: ' . $argv[3]);
        $crud = explode(':', $argv[3]);
        // print_r('CRUD: ' . $crud[3] . '
        // ');
        $stringData = "@extends('layouts.dashboard')

        @section('content')
        
        <div class=\"page-header\">
            <h1>
                <i class=\"fa fa-users\"></i>
                &nbsp;
                ";

        if ($crud[0] == 'table') {
            $stringData .= ucfirst($crud[1]) . "s List";
        } else if ($crud[0] == 'form') {
            $stringData .= "Create New " . ($crud[1]);
        } else if ($crud[1] == 'default') {
            $stringData .= "Dashboard";
        } else { }

        $stringData .= " List
            </h1>
        </div><!-- /.page-header -->
        <div class >
            <p>
                <b>
                    Note:
                </b>
                You can add your demo text here !
            </p>
        </div>
        
        {{-- @include('shared.notification') --}}
        
        ";

        if ($crud[0] == 'table') {
            $stringData .= "<div>";

            if ($crud[2]) {
                $stringData .= " <a href=\"{{ route('" . $crud[1] . ".create') }}\" class=\"btn btn-success\">
                    <i class=\"ace-icon fa fa-plus align-top bigger-125\"></i>
                    Create New " . ucfirst($crud[1]) . "
                </a> ";
            }

            $stringData .= " <span class=\"btn btn-info popover-info\" data-rel=\"popover\" data-placement=\"right\"
                 title=\"\" 
                 data-content=\" You Can Add Your Help Content Here ! \" 
                 data-original-title=\"Extra Info ?\">
                    <i class=\"fa fa-question-circle\" ></i> &nbsp; Help
                </span>
                <br><br>
        </div>";

            $stringData .= " {!! App\Library_Table::Table(
            '" . $crud[1] . "','Results for \"List Of " . ucfirst($crud[1]) . "s\"'," . $crud[3] . "," . $crud[4] . ",
            [";

            for ($x = 4; $x < count($argv); $x++) {
                $aa = explode('@', $argv[$x]);
                if ($x != 4) {
                    $stringData .= ",";
                }
                $aa[0] = str_replace('_', ' ', $aa[0]);
                $stringData .= "'" . ucfirst($aa[0]) . "'";
            }
            $stringData .= "],#!#" . $crud[1] . "s,
            [";
            for ($x = 4; $x < count($argv); $x++) {
                $aa = explode('@', $argv[$x]);
                if ($x != 4) {
                    $stringData .= ",";
                }
                $stringData .= "[";
                if (isset($aa[2]) && strtolower($aa[2]) == 'img') {
                    $stringData .= "'html' => '<div><img src=\'" . File::image_url() . "!!!!!\' alt=\'\' class=\'img-responsive img-circle icon-image\' ></div>',";
                } else {
                    $stringData .= "'html' => '!!!!!',";
                }
                $stringData .= "'data' => [";
                $aax = explode(':', $aa[1]);
                for ($y = 0; $y < count($aax); $y++) {
                    if ($y != 0) {
                        $stringData .= ",";
                    }
                    $stringData .= "'" . $aax[$y] . "'";
                }
                $stringData .= "]
                ] ";
            }
            $stringData .= "]
        ) !!}";
        }

        if ($crud[0] == 'form') {
            if (isset($crud[3]) && $crud[3] == 'edit') {
                $stringData .= "
                    <div>
                    <form class=\"form-horizontal\" action=\"{{ route('" . $crud[1] . ".update',['id'=>#!#" . $crud[1] . "->id]) }}\" method=\"post\" role=\"form\" enctype=\"multipart/form-data\" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        ";
            } else {
                $stringData .= "
                <div>
                <form class=\"form-horizontal\" action=\"{{ route('" . $crud[1] . ".store') }}\" method=\"post\" role=\"form\" enctype=\"multipart/form-data\" >
                    {{ csrf_field() }}
                    ";
            }

            for ($z = 4; $z < count($argv); $z++) {
                $former = explode(':', $argv[$z]);
                print_r('
                Former' . $former[3] . '
                ');
                $stringData .= "<div class=\"form-group {{ #!#errors->has('" . $former[1] . "') ? 'has-error' : '' }}\">
                            <label class=\"col-sm-3 control-label no-padding-right\" > " . str_replace('_', ' ', $former[0]) . " </label>
                            <div class=\"col-sm-9\">";

                if (strtolower($former[2]) == 'select') {
                    $stringData .= "\n<select class=\"col-xs-10 col-sm-5\" name=\"" . $former[1] . "\" >\n";
                    if (isset($former[5]) && strtolower($former[5]) == 'none')
                        $stringData .= "<option value=\"\" > None </option>\n";
                    $stringData .= "@foreach( App\\" . ucfirst($former[3]) . "::all() as #!#item )\n";
                    $stringData .= "<option ";
                    $stringData .= "\n@if( Session::has('" . strtolower($former[1]) . "') && Session::get('" . strtolower($former[1]) . "') == #!#item->id )\n";
                    $stringData .= "selected\n";
                    $stringData .= "@endif\n";
                    $stringData .= " value=\"{{ #!#item->id }}\" >{{ #!#item->" . $former[4] . " }}</option>\n";
                    $stringData .= "@endforeach\n";
                    $stringData .= "</select>\n";
                } else if (strtolower($former[2]) == 'checkbox' || strtolower($former[2]) == 'radio') {
                    $stringData .= "@foreach( App\\" . ucfirst($former[3]) . "::all() as #!#item )\n";
                    $stringData .= "<input type=\"" . (isset($former[2]) ? $former[2] : 'text') . "\" name=\"" . $former[1] . "[]\" value=\"#!#item->id\" ";
                    $stringData .= "<label> " . ucfirst((isset($former[4]) ? $former[4] : 'name')) . " </label>";
                    $stringData .= "<br>";
                    $stringData .= "@endforeach\n";
                } else {
                    $stringData .= "<input type=\"" . (isset($former[2]) ? $former[2] : 'text') . "\" id=\"form-field-1\" placeholder=\" " . (isset($former[3]) ? str_replace('_', ' ', $former[3]) : '') . " \" name=\"" . $former[1] . "\" value=\"{{ Session::has('" . $former[1] . "') ? Session::get('" . $former[1] . "') : ";
                    if (isset($crud[3]) && $crud[3] == 'edit') {
                        $stringData .= "#!#" . $crud[1] . "->" . $former[1];
                    } else {
                        $stringData .= "''";
                    }
                    $stringData .= "}}\"";
                    $stringData .= " class=\"col-xs-10 col-sm-5\">";
                }
                if (strtolower($former[2]) != 'select') {
                    $stringData .= "@if( #!#errors->has('" . $former[1] . "') )
                                <br>
                                <div class=\"block text-danger\" >
                                    <br>
                                    <b> Error ! </b>
                                    <p>
                                        {{ #!#errors->first('" . $former[1] . "') }}
                                    </p>
                                </div>
                                @endif";
                }
                $stringData .= "</div>
                        </div>";
            }

            $stringData .= "<div class=\"form-group\">
                                <label class=\"col-sm-3 control-label no-padding-right\" >  </label>

                                <div class=\"col-sm-9\">
                                        <button type=\"submit\" class=\"btn btn-primary\" >
                                                <i class=\"fa fa-plus\" ></i> &nbsp;
                                                " . (isset($crud[2]) ? ucfirst($crud[2]) : 'Submit') . "
                                            </button>
                                </div>
                            </div>

                        <div class=\"space-4\"></div>


                    </form>
        </div>
                ";
        }

        if ($crud[0] == 'page') { }

        $stringData .= " @endsection

        ";

        $stringData = str_replace('#!#', '$', $stringData);

        print_r($stringData);

        $fh = fopen($myFile, 'w');

        $fh = fopen($myFile, 'w') or die("can't open file");

        fwrite($fh, $stringData);
        fclose($fh);
    }
}

File::create($argv);
