<?php

$argv;

class File
{
    public static function model($argv)
    {
        $path = "app/";

        $miga = explode(':', $argv[1]);
        $name = $miga[0];
        $mig = isset($miga[1]) ? $miga[1] : '';

        if (!isset($miga[1]) || (strtolower($mig) != 'm' && strtolower($mig) != 'a')) {

            $stringData = "<?php

        namespace App;
        
        use Illuminate\Database\Eloquent\Model;
        
        class " . ucfirst($name) . " extends Model
        {
            protected #!#fillable = [";
            $count = 0;
            for (
                $x = 2;
                $x < count($argv);
                $x++
            ) {
                $field;
                $type;
                $name;
                $rest;
                $f;
                $relation;
                $fact;

                $field = $argv[$x];
                $field = explode(':', $field);

                $type = $field[0];

                $rest = $field[1];
                $rest = explode('*', $rest);

                $name = $rest[0];
                $name = explode('@', $name);

                $f = $name[0];
                $relation = isset($name[1]) ? $name[1] : '';

                $fact = isset($rest[1]) ? $rest[1] : '';
                if ($fact != '') {
                    $fact = explode(',', $fact);
                }
                if ($type != 'x' && $type != 'r') {
                    if ($relation == 'b') {
                        if ($count != 0) {
                            $stringData .= ", ";
                        }
                        $stringData .= "'" . strtolower($f) . "_id'";
                        $count++;
                    } else {
                        if ($count != 0) {
                            $stringData .= ", ";
                        }
                        $stringData .= "'" . strtolower($f) . "'";
                        $count++;
                    }
                }
            }

            $stringData .= "];
        ";

            for (
                $x = 2;
                $x < count($argv);
                $x++
            ) {
                $field;
                $type;
                $name;
                $rest;
                $f;
                $relation;
                $fact;

                $field = $argv[$x];
                $field = explode(':', $field);

                $type = $field[0];

                $rest = $field[1];
                $rest = explode('*', $rest);

                $name = $rest[0];
                $name = explode('@', $name);

                $f = $name[0];
                $relation = isset($name[1]) ? $name[1] : '';

                $fact = isset($rest[1]) ? $rest[1] : '';
                if ($fact != '') {
                    $fact = explode(',', $fact);
                }
                if ($relation == 'b') {
                    $stringData .= "public function " . $f . "(){";
                    $stringData .= "return #!#this->belongsTo('App\\" . ucfirst($f) . "');";
                    $stringData .= "}";
                }
                if ($relation == 'bm') {
                    $stringData .= "public function " . $f . "s(){";
                    $stringData .= "return #!#this->belongsToMany('App\\" . ucfirst($f) . "');";
                    $stringData .= "}";
                }
                if ($relation == 'ho') {
                    $stringData .= "public function " . $f . "(){";
                    $stringData .= "return #!#this->hasOne('App\\" . ucfirst($f) . "');";
                    $stringData .= "}";
                }
                if ($relation == 'hm') {
                    $stringData .= "public function " . $f . "s(){";
                    $stringData .= "return #!#this->hasMany('App\\" . ucfirst($f) . "');";
                    $stringData .= "}";
                }
            }

            $stringData .= "
        }
        
        ";
        } else if (strtolower($mig) == 'a') {

            $stringData = "<?php

        namespace App;
        
        use Illuminate\Notifications\Notifiable;
        use Illuminate\Foundation\Auth\User as Authenticatable;
        
        class " . ucfirst($name) . " extends Authenticatable
        {
            use Notifiable;

            /**
             * The attributes that are mass assignable.
             *
             * @var array
             */
            protected #!#fillable = [";

            $count = 0;
            for (
                $x = 2;
                $x < count($argv);
                $x++
            ) {
                $field;
                $type;
                $name;
                $rest;
                $f;
                $relation;
                $fact;

                $field = $argv[$x];
                $field = explode(':', $field);

                $type = $field[0];

                $rest = isset($field[1]) ? $field[1] : '';
                // print_r('Rest: ' . $rest . '
                // ');
                $rest = explode('*', $rest);

                $name = $rest[0];
                $name = explode('@', $name);

                $f = $name[0];
                $relation = isset($name[1]) ? $name[1] : '';

                $fact = isset($rest[1]) ? $rest[1] : '';
                if ($fact != '') {
                    $fact = explode(',', $fact);
                }
                if ($type != 'x' && $type != 'r') {
                    if ($relation == 'b') {
                        if ($count != 0) {
                            $stringData .= ", ";
                        }
                        $stringData .= "'" . strtolower($f) . "_id'";
                        $count++;
                    } else {
                        if ($count != 0) {
                            $stringData .= ", ";
                        }
                        $stringData .= "'" . strtolower($f) . "'";
                        $count++;
                    }
                }
            }

            $stringData .= "];";

            // print_r($stringData);

            $stringData .= "
            protected #!#hidden = [
                'password', 'remember_token',
            ];
            ";

            for (
                $x = 2;
                $x < count($argv);
                $x++
            ) {
                $field;
                $type;
                $name;
                $rest;
                $f;
                $relation;
                $fact;

                $field = $argv[$x];
                $field = explode(':', $field);

                $type = $field[0];

                $rest = isset($field[1]) ? $field[1] : '';
                $rest = explode('*', $rest);

                $name = $rest[0];
                $name = explode('@', $name);

                $f = $name[0];
                $relation = isset($name[1]) ? $name[1] : '';

                $fact = isset($rest[1]) ? $rest[1] : '';
                if ($fact != '') {
                    $fact = explode(',', $fact);
                }
                if ($relation == 'b') {
                    $stringData .= "public function " . $f . "(){";
                    $stringData .= "return #!#this->belongsTo('App\\" . ucfirst($f) . "');";
                    $stringData .= "}";
                }
                if ($relation == 'bm') {
                    $stringData .= "public function " . $f . "s(){";
                    $stringData .= "return #!#this->belongsToMany('App\\" . ucfirst($f) . "');";
                    $stringData .= "}";
                }
                if ($relation == 'ho') {
                    $stringData .= "public function " . $f . "(){";
                    $stringData .= "return #!#this->hasOne('App\\" . ucfirst($f) . "');";
                    $stringData .= "}";
                }
                if ($relation == 'hm') {
                    $stringData .= "public function " . $f . "s(){";
                    $stringData .= "return #!#this->hasMany('App\\" . ucfirst($f) . "');";
                    $stringData .= "}";
                }
            }

            $stringData .= "
        }
        
        ";
        }

        $myFile = $path . ucfirst(explode(':', $argv[1])[0]) . ".php";
        $fh = fopen($myFile, 'w');

        $fh = fopen($myFile, 'w') or die("can't open file");

        $stringData = str_replace('#!#', '$', $stringData);

        fwrite($fh, $stringData);
        fclose($fh);
    }

    public static function migration($argv)
    {
        $path = "database/migrations/";

        ///////////////////

        $myFile = "";
        $s = "";
        $miga = explode(':', $argv[1]);
        $name = $miga[0];
        $mig = isset($miga[1]) ? $miga[1] : '';
        if (true) {
            $search = strtolower($name);
            if ($search[strlen($search) - 1] == 'y') {
                $search[strlen($search) - 1] = 'i';
                $search[strlen($search) - 0] = 'e';
                $search[strlen($search) + 1] = 's';
                $search = str_replace(' ', '', $search);
            } else if (
                ($search[strlen($search) - 1] == 'h' && $search[strlen($search) - 2] == 's')
                || ($search[strlen($search) - 1] == 'h' && $search[strlen($search) - 2] == 'c')
                || $search[strlen($search) - 1] == 's'
                || $search[strlen($search) - 1] == 'x'
                || $search[strlen($search) - 1] == 'z'
            ) {
                $search[strlen($search) - 0] = 'e';
                $search[strlen($search) + 1] = 's';
                $search = str_replace(' ', '', $search);
            } else {
                $s = 's';
            }
            $it = new FilesystemIterator('database/migrations');
            $ok = true;
            foreach ($it as $fileinfo) {
                if (strpos(strtolower($fileinfo->getFilename()), strtolower($search . $s)) !== false) {
                    $tmp = $fileinfo->getFilename();
                    $myFile = $path . $tmp;
                    $ok = false;
                    break;
                }
            }

            if ($ok) {
                $myFile = $path . date('Y_m_d') . '_' . date('His') . '_create_' . strtolower($search . $s) . "_table.php";
            }

            ////////////////////
            $fh = fopen($myFile, 'w');

            $fh = fopen($myFile, 'w') or die("can't open file");
            print_r($myFile);
            $stringData = "<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create" . ucfirst($search) . $s . "Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('" . strtolower($search . $s);

            $stringData .= "', function (Blueprint #!#table) {
            #!#table->increments('id');
            ";

            for ($x = 2; $x < count($argv); $x++) {
                $field;
                $type;
                $name;
                $rest;
                $f;
                $relation;
                $fact;

                $field = $argv[$x];
                $field = explode(':', $field);

                $type = $field[0];

                $rest = isset($field[1]) ? $field[1] : '';
                $rest = explode('*', $rest);

                $name = $rest[0];
                $name = explode('@', $name);

                $f = $name[0];
                $relation = isset($name[1]) ? $name[1] : '';

                $fact = isset($rest[1]) ? $rest[1] : '';
                if ($fact != '') {
                    $fact = explode(',', $fact);
                }

                // print_r($fact);

                $proceed = true;

                if ($type == 's') {
                    $stringData .= "#!#table->string(";
                } else if ($type == 'i') {
                    $stringData .= "#!#table->integer(";
                } else if ($type == 'b') {
                    $stringData .= "#!#table->boolean(";
                } else if ($type == 'x') {
                    $proceed = false;
                } else if ($type == 'r') {
                    $proceed = false;
                    $stringData .= "#!#table->rememberToken();";
                } else if ($type == 'd') {
                    $stringData .= "#!#table->date(";
                }
                if ($proceed) {
                    $stringData .= "'" . strtolower($f);

                    if ($relation == 'b') {
                        $stringData .= '_id';
                    }

                    $stringData .= "')";

                    if (is_array($fact) && count($fact) > 0) {
                        foreach ($fact as $key => $value) {
                            $value = explode('=', $value);
                            if ($value[0] == 'd') {
                                $stringData .= "->default(" . $value[1] . ")";
                            }
                            if ($value[0] == 'n') {
                                $stringData .= "->nullable()";
                            }
                            if ($value[0] == 'u') {
                                $stringData .= "->unique()";
                            }
                            if ($value[0] == 'uns') {
                                $stringData .= "->unsigned()";
                            }
                        }
                    }

                    $stringData .= ";";
                }
            }

            $stringData .= "
            #!#table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('" . strtolower($search) . $s . "');
    }
}

        ";

            $stringData = str_replace('#!#', '$', $stringData);

            fwrite($fh, $stringData);
            fclose($fh);
        }
    }
}

File::migration($argv);
File::model($argv);
