<?php

require 'common.php';

function parseDictDataFromFile(string $fileName): array
{
    $result = [];
    $file = fopen(DIR_NAME . '/' . $fileName, 'r');
    while (!feof($file))
    {
        $line = fgets($file);
        if (!empty($line))
        {
            $parsed = explode(':', $line);
            $result += ["$parsed[0]" => $parsed[1]];
        }
    }
    fclose($file);

    return $result;
}
