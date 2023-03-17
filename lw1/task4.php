<?php

function parsePassword(): string
{
    if(!array_key_exists('password', $_GET))
    {
        return '';
    }
    return  $_GET['password'];
}

function getRepeatsNumber(string $str): int
{
    $strData = array_count_values(str_split($str));
    return array_sum(array_filter($strData, function($item){return $item != 1;}));
}

$password = parsePassword();
if(empty($password))
{
    echo "<h1>Enter password to query params</h1>";
    return;
}

echo "<h1>{$password}</h1>";
$strength = 0;
$length = strlen($password);
$digitsNumber = preg_match_all("/[0-9]/", $password);
$upperCasesNumber = preg_match_all("/[A-Z]/", $password);
$lowerCasesNumber = preg_match_all("/[a-z]/", $password);
$lettersNumber = $upperCasesNumber + $lowerCasesNumber;
$repeatsNumber = getRepeatsNumber($password);

echo "length = $length<br>";
echo "digitsNumber = $digitsNumber<br>";
echo "upperCasesNumber = $upperCasesNumber<br>";
echo "lowerCasesNumber = $lowerCasesNumber<br>";
echo "repeatsNumber = $repeatsNumber<br>";

$strength += 4 * $length;
$strength += 4 * $digitsNumber;
if($upperCasesNumber != 0)
{
    $strength += ($length - $upperCasesNumber) * 2;
}
if($lowerCasesNumber != 0)
{
    $strength += ($length - $lowerCasesNumber) * 2;
}
if($lettersNumber == $length)
{
    $strength -= $length;
}
if($digitsNumber == $length)
{
    $strength -= $length;
}
$strength -= $repeatsNumber;

echo "<h1>Надежность пароля: $strength</h1>";


