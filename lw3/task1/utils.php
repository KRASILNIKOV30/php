<?php

function compareFloats(float $value1, float $value2): int
{
    if(abs($value1 - $value2) < PHP_FLOAT_EPSILON)
    {
        return 0;
    }
    return $value2 > $value1 ? 1 : -1;
}

function arrayEquals(array $left, array $right): bool
{
    if(count($left) !== count($right))
    {
        return false;
    }
    $keys = array_keys($left);
    foreach($keys as $key)
    {
        if(array_key_exists($key, $right))
        {
            if($left[$key] !== $right[$key])
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }
    return true;
}

function arrayNumberFilter(array $data): array
{
    return array_filter($data, function($item){ return is_numeric($item); });
}
