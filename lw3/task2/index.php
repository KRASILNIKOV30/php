<?php

require_once 'dictParser.php';

if ($dh = opendir('dict'))
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
