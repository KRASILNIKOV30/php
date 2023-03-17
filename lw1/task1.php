<?php

function parseArgsToArray(int $argc, array $argv): array
{
    if($argc <= 1)
    {
        return [];
    }
    return array_slice($argv, 1);
}

$array = parseArgsToArray($argc, $argv);
if(empty($array))
{
    echo "Invalid arguments count", "\n";
    echo "Arguments must contain at least one element", "\n";
    return;
}
echo "Max: ",  max($array), "\n";
echo "Min: ",  min($array);