<?php

function singleElement(array &$arr): int
{
    $size = sizeof($arr);
    $el1 = $arr[0];
    for ($i = 1; $i < $size; $i++) {
        $el1 = $el1 ^ $arr[$i];
    }
    return $el1;
}

$arr = [10, 8, 6, 4, 6, 8, 10, 4, 2];
echo "Single Element is: " . singleElement($arr);
