<?php

function isSubset($arr1, $arr2): bool
{
    $size1 = sizeof($arr1);
    $size2 = sizeof($arr2);
    $temp = array();
    for ($i = 0; $i < $size1; $i++) {
        $temp[$arr1[$i]] = 1;
    }
    for ($i = 0; $i < $size2; $i++) {
        if (!array_key_exists($arr2[$i], $temp)) {
            return false;
        }
    }
    return true;
}

$arr1 = [11, 1, 13, 21, 3, 7];
$arr2 = [11, 3, 7, 1];

if (isSubset($arr1,  $arr2))
    echo "arr2[] is subset of arr1[]";
else
    echo "arr2[] is not a subset of arr1[]";
