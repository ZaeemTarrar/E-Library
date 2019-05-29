<?php

class Zipper
{
    public static function zip($zipName, $pathTo)
    {
        $zip = new ZipArchive();
        $zip->open($zipName . '.zip');

        for ($num = 0; $num < $zip->numFiles; $num++) {
            $fileInfo = $zip->statIndex($num);
            print_r($fileInfo);
            $zip->extractTo($pathTo);
        }
        $zip->close();
        print_r($zipName . ' Extracted Successfully to ' . $pathTo);
    }
}

$extract = $argv[1];
$to = $argv[2];


Zipper::zip($extract, $to);
