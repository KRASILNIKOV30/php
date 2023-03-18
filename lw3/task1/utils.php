<?php

function compareFloats(float $value1, float $value2): int
{
    $epsilon = 1e-6;
    if(abs($value1 - $value2) < $epsilon)
    {
        return 0;
    }
    return $value2 > $value1 ? 1 : -1;
}

function arrayEquals(array $left, array $rights): bool
{
    return $left === $rights;
}

function arrayNumberFilter(array $data): array
{
    return array_filter($data, function($item){ return is_numeric($item); });
}
