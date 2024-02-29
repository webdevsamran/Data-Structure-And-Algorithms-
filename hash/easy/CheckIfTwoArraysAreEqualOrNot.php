<?php

function checkIfArraysAreEqual($arr1, $arr2): bool
{
    $hash1 = array();
    $hash2 = array();
    for ($i = 0; $i < sizeof($arr1); $i++) {
        if (!array_key_exists($arr1[$i], $hash1)) {
            $hash1[$arr1[$i]] = 0;
        }
        $hash1[$arr1[$i]]++;
    }
    for ($i = 0; $i < sizeof($arr2); $i++) {
        if (!array_key_exists($arr2[$i], $hash2)) {
            $hash2[$arr2[$i]] = 0;
        }
        $hash2[$arr2[$i]]++;
    }
    return $hash1 == $hash2;
}

$arr1 = [1, 2, 5, 4, 0, 2];
$arr2 = [2, 4, 5, 2, 0, 1];
if (checkIfArraysAreEqual($arr1, $arr2)) {
    echo "Both are Equal";
} else {
    echo "Both are not Equal";
}
