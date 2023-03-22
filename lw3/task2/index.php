<?php

require_once 'dictParser.php';
require 'common.php';

if ($dh = opendir(DIR_NAME))
{
    $dict = [];
    while (($file = readdir($dh)) !== false)
    {
        if ($file === '.' || $file === '..')
        {
            continue;
        }
        $dict += parseDictDataFromFile($file);
    }
    closedir($dh);
    ksort($dict);
    $output = fopen('out.txt', 'w');
    foreach ($dict as $key => $value)
    {
        fwrite($output, $key . ': ' . $value);
    }
    fclose($output);
}
