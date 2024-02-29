<?php

function countPairs($arr, $sum): void
{
    $temp = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        if (!array_key_exists($arr[$i], $temp)) {
            $temp[$arr[$i]] = 0;
        }
        $temp[$arr[$i]]++;
    }
    $totalPairs = 0;
    for ($i = 0; $i < sizeof($arr); $i++) {
        $key = $sum - $arr[$i];
        if (array_key_exists($key, $temp)) {
            $totalPairs += $temp[$key];
        }
        if ($sum - $arr[$i] == $arr[$i]) {
            $totalPairs--;
        }
    }
    echo $totalPairs / 2 . " are the total Pairs present.<br/>";
}

$arr1 = [10, 12, 10, 15, -1, 7, 6, 5, 4, 2, 1, 1, 1];
countPairs($arr1, 11);
