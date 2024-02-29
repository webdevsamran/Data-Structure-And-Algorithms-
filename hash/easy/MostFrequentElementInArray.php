<?php

function sortByVal($a, $b)
{
    return $b > $a;
}

function mostFrequentElement($arr): void
{
    $count = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        if (!array_key_exists($arr[$i], $count)) {
            $count[$arr[$i]] = 0;
        }
        $count[$arr[$i]]++;
    }
    arsort($count);
    echo array_key_first($count) . " is the most frequent Element";
}

$arr = [0, 1, 3, 2, 1, 4, 1];
mostFrequentElement($arr);
