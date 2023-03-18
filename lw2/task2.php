<?php
parse_str(implode("&", array_slice($argv, 1)), $array);
$maxStr = $array[array_key_first($array)];
$minStr = $array[array_key_first($array)];
foreach ($array as $str) {
    if (strcmp($str, $maxStr) === 1) {
        $maxStr = $str;
    }
    if (strcmp($str, $minStr) === -1) {
        $minStr = $str;
    }
}

echo "Max: ", array_search($maxStr, $array), "\n";
echo "Min: ", array_search($minStr, $array);