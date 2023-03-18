<?php

function parseDictDataFromFile(string $fileName): array
{
    $result = [];
    $file = fopen("dict/" . $fileName, 'r');
    while (!feof($file))
    {
        $line = fgets($file);
        $parsed = explode(':', $line);
        $result += ["$parsed[0]" => $parsed[1]];
    }
    fclose($file);

    return $result;
}

if ($dh = opendir('dict'))
{
    $dict = [];
    while (($file = readdir($dh)) !== false)
    {
        if ($file === '.' || $file === '..')
        {
            continue;
        }
        array_merge($dict, parseDictDataFromFile($file));
    }
    closedir($dh);
    ksort($dict);
    $output = fopen('out.txt', 'w');
    foreach ($dict as $key => $value)
    {
        fwrite($output, $key . ': ' . $value . "\n");
    }
    fclose($output);
}
