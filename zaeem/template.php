<?php

$argv;

class File
{
    public static function create($name, $level, $filetype, $tmp)
    {
        $path = $name;

        $files = [];
        $it = new FilesystemIterator($path);
        foreach ($it as $fileinfo) {
            if (true) {
                $file = $fileinfo->getFilename();
                //$files[] = $file;
                if (is_dir($path . '/' . $file)) {
                    print_r('
                    ');
                    for ($x = 0; $x < $level; $x++) {
                        print_r('    ');
                    }
                    print_r('=> ' . $file);
                    File::create($path . '/' . $file, $level + 1, $filetype, $tmp);
                } else {

                    if (strpos($file, $filetype) !== false) {
                        print_r('
                        ');
                        for ($x = 0; $x < $level; $x++) {
                            print_r('    ');
                        }
                        print_r($path . '/' . $file);
                        File::htmlMaker($path . '/' . $file, $tmp);
                    } else {
                        print_r('
                        ');
                        for ($x = 0; $x < $level; $x++) {
                            print_r('    ');
                        }
                        print_r($path . '/' . $file);
                        File::pathMaker($path . '/' . $file);
                    }
                }
            }
        }

        // next
        //File::loadView('resources/views/site/' . $tmp);
    }

    public static function similarMap($tmp, $find, $end)
    {
        $similar = File::viewMap($tmp, $find, $end);
        $pages = [];
        // print_r($similar);
        $match = [];
        $path2 = $tmp;
        $it2 = new FilesystemIterator($path2);
        foreach ($it2 as $fileinfo2) {
            if (true) {
                $file = $fileinfo2->getFilename();
                //$files[] = $file;
                if (is_dir($path2 . '/' . $file)) {
                    File::similarMap($path2 . '/' . $file, $find, $end);
                } else {

                    $file_page = file_get_contents($path2 . '/' . $file);
                    $page[] = $file_page;
                }
            }
        }

        foreach ($similar as $key => $value) {
            $times = count($pages);
            $count = 0;
            foreach ($pages as $key2 => $value2) {
                if ((strpos($value2, $value)) !== false) {
                    $count++;
                }
            }
            if ($times == $count || $times == $count - 2) {
                $match[] = $value;
            }
        }

        $match = array_unique($match);
        $match = str_replace('<!--', '', $match);
        $match = str_replace('-->', '', $match);
        print_r($match);
    }

    public static function viewMap($tmp, $find, $end)
    {
        $myProjectComments = [];
        $similar_comments = [];

        $path2 = $tmp;
        $it2 = new FilesystemIterator($path2);
        foreach ($it2 as $fileinfo2) {
            if (true) {
                $file = $fileinfo2->getFilename();
                //$files[] = $file;
                if (is_dir($path2 . '/' . $file)) {
                    File::viewMap($path2 . '/' . $file, $find, $end);
                } else {
                    //                     print_r($path2 . '/' . $file . '
                    // ');
                    $file_page = file_get_contents($path2 . '/' . $file);
                    //print_r($file_page);
                    $comment_list = File::getHtml($file_page, $find, $end);

                    foreach ($comment_list as $key => $value) {
                        $myProjectComments[] = $value;
                    }

                    $myProjectComments = array_unique($myProjectComments);

                    foreach ($myProjectComments as $key => $value) {
                        $similar_comments[] = $value;
                    }
                }
            }
        }

        return $similar_comments;
    }

    public static function loadView($tmp, $argv)
    {
        $myProjectLinks = [];
        $myProjectMetas = [];
        $myProjectJs = [];
        $myProjectTitle = [];
        $myProjectHtml = [];
        $myProjectHead = [];
        $myProjectBody = [];
        $images = [];

        $path2 = $tmp;
        $it2 = new FilesystemIterator($path2);
        foreach ($it2 as $fileinfo2) {
            if (true) {
                $file = $fileinfo2->getFilename();
                //$files[] = $file;
                if (is_dir($path2 . '/' . $file)) {
                    File::loadView($path2 . '/' . $file, $argv);
                } else {
                    //                     print_r($path2 . '/' . $file . '
                    // ');
                    $file_page = file_get_contents($path2 . '/' . $file);
                    //print_r($file_page);
                    $link_list = File::getHtml($file_page, '<link', '>');
                    $meta_list = File::getHtml($file_page, '<meta', '>');
                    $js_list = File::getHtml($file_page, '<script', '</script>');
                    $title_list = File::getHtml($file_page, '<title', '</title>');
                    $html_list = File::getHtml($file_page, '<html>', '</html>');
                    $head_list = File::getHtml($file_page, '<head>', '</head>');
                    $body_list = File::getHtml($file_page, '<body>', '</body>');

                    foreach ($link_list as $key => $value) {
                        $myProjectLinks[] = $value;
                    }
                    foreach ($meta_list as $key => $value) {
                        $myProjectMetas[] = $value;
                    }
                    foreach ($js_list as $key => $value) {
                        $myProjectJs[] = $value;
                    }
                    foreach ($title_list as $key => $value) {
                        $myProjectTitle[] = $value;
                    }
                }
            }
        }
        $myProjectLinks = array_unique($myProjectLinks);
        $myProjectMetas = array_unique($myProjectMetas);
        $myProjectJs = array_unique($myProjectJs);
        $myProjectTitle = array_unique($myProjectTitle);

        $layout = File::makeHtmlLayout($argv, $myProjectTitle, $myProjectMetas, $myProjectLinks, $myProjectJs);
        //print_r($layout);
    }

    public static function getAllFiles($tmp)
    {
        $files = [];
        $path2 = $tmp;
        $it2 = new FilesystemIterator($path2);
        foreach ($it2 as $fileinfo2) {
            if (true) {
                $file = $fileinfo2->getFilename();
                //$files[] = $file;
                if (is_dir($path2 . '/' . $file)) {
                    File::getAllFiles($path2 . '/' . $file);
                } else {
                    $file_page = file_get_contents($path2 . '/' . $file);
                    $files[] = $file_page;
                }
            }
        }
        return $files;
    }

    public static function makeHtmlLayout($argv, $t, $m, $l, $js)
    {
        $pathStart = "href=\"{{ url('site/" . $argv[1] . "/";
        $pathEnd = "') }}\"";
        $myHtml = "";
        $myHtml .= "<html>";
        $myHtml .= "<head>";
        foreach ($t as $key => $value) {
            $myHtml .= $value;
        }
        foreach ($m as $key => $value) {
            $myHtml .= $value;
        }
        foreach ($l as $key => $value) {
            if (
                (strpos($value, "href=\"http:")) !== false
                || (strpos($value, "href=\"https:")) !== false
                || (strpos($value, "href='https:")) !== false
                || (strpos($value, "href='http:")) !== false
            ) { } else {
                $value = str_replace("href=\"", $pathStart, $value);
                $value = str_replace("href='", $pathStart, $value);
                $value = str_replace(".css'", ".css" . $pathEnd, $value);
                $value = str_replace(".css\"", ".css" . $pathEnd, $value);
            }

            $myHtml .= $value;
        }
        $myHtml .= "</head>";
        $myHtml .= "<body>";

        $inners = explode(':', $argv[4]);

        foreach ($inners as $key => $value) {
            $value = explode('@', $value);

            if (isset($value[1]) && strtolower($value[1]) == 'yield') {

                $val = $value[0];
                $val = strtoupper($val);
                $start = "<!-- " . $val . " -->";
                $end = "<!-- /" . $val . " -->";
                $files = File::getAllFiles('resources/views/site');

                $codes = [];

                foreach ($files as $key2 => $value2) {
                    $code = File::getHtml($value2, $start, $end);
                    $codes[] = $code;
                    $code = File::getHtml($value2, strtolower($start), strtolower($end));
                    $codes[] = $code;
                }

                $codes2 = [];

                foreach ($codes as $key3 => $value3) {
                    if ($value3 == "" || $value3 == null) { } else {
                        $codes2[] = $value3;
                    }
                }

                $codes = $codes2;

                $myCode = $codes[0][0];
                $myCode = str_replace($start, '', $myCode);
                $myCode = str_replace($end, '', $myCode);
                $myCode = str_replace(strtolower($start), '', $myCode);
                $myCode = str_replace(strtolower($end), '', $myCode);

                $comments_there = true;

                while ($comments_there) {
                    $com = File::getHtml($myCode, '<!--', '-->');
                    if ($com) {
                        $comments_there = false;
                    }
                    $myCode = str_replace($com, '', $myCode);
                }

                $myStartTags = [];
                $myEndTags = [];

                $content = $myCode;
                $detail = [];
                if (isset($value[2])) {
                    $detail = File::htmlTree($myCode, $value[2]);
                }

                foreach ($detail['start'] as $key4 => $value4) {
                    $myHtml .= $value4;
                }

                $myHtml .= "@yield('content')";

                foreach ($detail['end'] as $key4 => $value4) {
                    $myHtml .= $value4;
                }
            } else if ($value[0] == 'yield') {
                $myHtml .= "@yield('content')";
            } else {
                $value = $value[0];
                $value = strtoupper($value);
                $start = "<!-- " . $value . " -->";
                $end = "<!-- /" . $value . " -->";
                $files = File::getAllFiles('resources/views/site');

                $codes = [];

                foreach ($files as $key2 => $value2) {
                    $code = File::getHtml($value2, $start, $end);
                    $codes[] = $code;
                    $code = File::getHtml($value2, strtolower($start), strtolower($end));
                    $codes[] = $code;
                }

                $arrList = [];

                foreach ($codes as $k => $v) {
                    if (is_array($v)) {
                        foreach ($v as $k2 => $v2) {
                            if (trim($v2) == "" || $v2 == null) { } else {
                                $arrList[] = $v2;
                            }
                        }
                    } else {
                        if (trim($v) == "" || $v == null) { } else {
                            $arrList[] = $v;
                        }
                    }
                }

                $codes = $arrList;

                $myHtml .= $codes[0];
                // print_r($codes);
                // exit;
            }
        }

        $myHtml .= "</body>";
        foreach ($js as $key => $value) {
            if (
                (strpos($value, "src=\"http:")) !== false
                || (strpos($value, "src=\"https:")) !== false
                || (strpos($value, "src='http:")) !== false
                || (strpos($value, "src='https:")) !== false
            ) { } else {
                $value = str_replace("src=\"", $pathStart, $value);
                $value = str_replace("src='", $pathStart, $value);
                $value = str_replace(".js'", ".js" . $pathEnd, $value);
                $value = str_replace(".js\"", ".js" . $pathEnd, $value);
            }

            $myHtml .= $value;
        }
        $myHtml .= "</html>";

        // Image Section

        $imgStart = "<img src=\"{{ url('site/" . $argv[1] . "/";
        $imgEnd = "') }}\"";

        $replaced = true;

        if ($replaced && (strpos($myHtml, "<img src=\".")) !== false) {
            $myHtml = str_replace("<img src=\".", $imgStart, $myHtml);
            $replaced = false;
        }

        if ($replaced && (strpos($myHtml, "<img src=\"")) !== false) {
            $myHtml = str_replace("<img src=\"", $imgStart, $myHtml);
            $replaced = false;
        }

        $myHtml = str_replace(".jpg", ".jpg" . $imgEnd, $myHtml);
        $myHtml = str_replace(".jepg", ".e" . $imgEnd, $myHtml);
        $myHtml = str_replace(".ico", ".ico" . $imgEnd, $myHtml);
        $myHtml = str_replace(".gif", ".gif" . $imgEnd, $myHtml);
        $myHtml = str_replace(".png", ".png" . $imgEnd, $myHtml);

        $myHtml = str_replace('//', '/', $myHtml);

        // Image Section

        $path = 'resources/views/layouts/';
        $myFile = $path . 'site.blade.php';

        $fh = fopen($myFile, 'w');

        $fh = fopen($myFile, 'w') or die("can't open file");

        fwrite($fh, $myHtml);
        fclose($fh);

        //return $myHtml;
    }

    public static function htmlTree($myCode, $level)
    {
        $tag1 = File::getHtml($myCode, '<', '>');

        $tagends = [];

        foreach ($tag1 as $key => $value) {
            $tmpTag = "";
            if ((strpos($value, ' ')) !== false) {
                $tmpTag = trim(explode(' ', $value)[0]);
            }
            $tag1end = "";
            if (trim($tmpTag) == "") {
                $tmpTag = $value;
            } else { }
            $tag1end = str_replace('<', '</', $tmpTag);
            $tag1end .= '>';
            $tagends[] = $tag1end;
        }

        $copyStart = [];
        $copyEnd = [];

        foreach ($tag1 as $key => $value) {
            if (
                (strpos($value, '</') !== false)
            ) { } else {
                $copyStart[] = $value;
            }
        }

        foreach ($tagends as $key => $value) {
            if (
                (strpos($value, '>>') !== false)
                || (strpos($value, '//') !== false)
            ) { } else {
                $copyEnd[] = $value;
            }
        }

        $tag1 = $copyStart;
        $tagends = $copyEnd;

        $tree = [];

        $count = 0;
        foreach ($tag1 as $key => $value) {
            $count++;

            $tree['start'][] = $value;
            $tree['end'][] = $tagends[$key];

            if ($count == $level) {
                break;
            }
        }

        // print_r($tree);
        // exit;
        return $tree;
    }

    public static function getHtml($html, $find, $end)
    {
        $start = [];
        $finish = [];

        $position = 0;

        $myProjectLinks = [];

        while (($position = strpos($html, $find, $position)) !== false) {
            $start[] = $position;
            $pos2 = 0;

            $pos2 = strpos($html, $end, $position);

            $finish[] = $pos2;

            $position = $position + strlen($find);
        }

        for ($x = 0; $x < count($start); $x++) {
            $cutter = substr($html, $start[$x], ($finish[$x] - $start[$x]) + strlen($end));
            $myProjectLinks[] = $cutter;
        }

        if (count($myProjectLinks) > 0) {
            $myProjectLinks = array_unique($myProjectLinks);

            return $myProjectLinks;
        } else {
            return false;
        }
    }

    public static function getHtmlLinks($html)
    {
        $start = [];
        $finish = [];
        $find = '<link';
        $end = '>';
        $position = 0;

        $myProjectLinks = [];

        while (($position = strpos($html, $find, $position)) !== false) {
            $start[] = $position;
            $pos2 = 0;

            $pos2 = strpos($html, $end, $position);

            $finish[] = $pos2;

            $position = $position + strlen($find);
        }

        for ($x = 0; $x < count($start); $x++) {
            $cutter = substr($html, $start[$x], $finish[$x] - $start[$x]);
            $myProjectLinks[] = $cutter;
        }

        $myProjectLinks = array_unique($myProjectLinks);

        return $myProjectLinks;
    }

    public static function pathMaker($name)
    {
        $name2 = str_replace('my_templates', 'public/site', $name);
        $list = explode('/', $name2);
        $tmp_path = "";
        for ($x = 0; $x < count($list) - 1; $x++) {
            if ($x == 0) {
                $tmp_path = $tmp_path . $list[$x];
            } else {
                $tmp_path = $tmp_path . '/' . $list[$x];
            }
            //             print_r($tmp_path . '
            // ');
            if (!is_dir($tmp_path)) {
                mkdir($tmp_path);
                //print_r($tmp_path);
            } else { }
        }
        copy($name, $name2);
    }
    public static function htmlMaker($name, $tmp)
    {
        $name2 = str_replace($tmp . '/', '', $name);
        $name3 = str_replace('my_templates', 'resources/views/site', $name2);
        print_r($name3 . '
');
        $list = explode('/', $name3);
        $tmp_path = "";
        for ($x = 0; $x < count($list) - 1; $x++) {
            if ($x == 0) {
                $tmp_path = $tmp_path . $list[$x];
            } else {
                $tmp_path = $tmp_path . '/' . $list[$x];
            }
            //             print_r($tmp_path . '
            // ');
            if (!is_dir($tmp_path)) {
                mkdir($tmp_path);
                //print_r($tmp_path);
            } else { }
        }
        $name4 = str_replace('.html', '.blade.php', $name3);
        copy($name, $name4);
    }

    public static function frontSiteConfig($tmp, $pages)
    {
        $names = explode(':', $pages);

        foreach ($names as $key => $name) {
            $path = $tmp;
            $name = $name . '.blade.php';
            $file = $path . '/' . $name;

            if (!is_dir($path)) {
                mkdir($path);
            }

            $myFile = $file;

            $fh = fopen($myFile, 'w');

            $fh = fopen($myFile, 'w') or die("can't open file");

            $myHtml = " @extends('layouts.site')

        @section('content')
        
        <div>
            Your Content Will Come Here !
        </div>
        
        @endsection";

            fwrite($fh, $myHtml);
            fclose($fh);
        }
    }
}

if (strtolower($argv[3]) == 'classify') {
    File::create('my_templates/' . $argv[1], 1, $argv[2], $argv[1]);
} else if (strtolower($argv[3]) == 'assets') {
    File::loadView('resources/views/site', $argv);
} else if (strtolower($argv[3]) == 'map') {
    File::similarMap('resources/views/site', '<!--', '-->');
} else if (strtolower($argv[3]) == 'pages') {
    File::frontSiteConfig('resources/views/front', $argv[4]);
} else { }
