<?php

function minimumNumberOfDistinctElements($arr): void
{
    $temp = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        if (!array_key_exists($arr[$i], $temp)) {
            $temp[$arr[$i]] = 0;
        }
        $temp[$arr[$i]]++;
    }
    print_r($temp);
    echo max($temp) . " is the Minimum Number of Distinct Elements.<br/>";
}

$arr1 = [1, 2, 3, 4];
$arr2 = [1, 2, 3, 3];
minimumNumberOfDistinctElements($arr1);
minimumNumberOfDistinctElements($arr2);
