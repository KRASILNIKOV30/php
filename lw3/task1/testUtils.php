<?php

require_once './utils.php';

$inputData = array_slice($argv, 1);
$float1 = $inputData[0];
$float2 = $inputData[1];
$array1 = array_slice($inputData, 2, 3);
$array2 = array_slice($inputData, 5);

echo "float1 = {$float1}\n";
echo "float2 = {$float2}\n";
echo 'array1 = ';
foreach($array1 as $item)
{
    echo $item . ' ';
}
echo "\narray2 = ";
foreach($array2 as $item)
{
    echo $item . ' ';
}
echo "\n\n";

$compareFloatsResult = compareFloats($float1, $float2);
if($compareFloatsResult === 1)
{
    echo "float1 < float2\n";
}
elseif($compareFloatsResult === -1)
{
    echo "float1 > float2\n";
}
else
{
    echo "float1 = float2\n";
}

if(arrayEquals($array1, $array2))
{
    echo "array1 = array2\n";
}
else
{
    echo "array1 != array2\n";
}

echo "numbers in array1: ";
foreach(arrayNumberFilter($array1) as $num)
{
    echo "$num ";
}
echo "\n";

echo "numbers in array2: ";
foreach(arrayNumberFilter($array2) as $num)
{
    echo "$num ";
}
echo "\n";