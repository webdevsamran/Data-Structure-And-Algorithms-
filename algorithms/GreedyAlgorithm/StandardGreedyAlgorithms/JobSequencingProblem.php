<?php

function sortByProfit($a, $b)
{
    return $b[2] > $a[2];
}

function printJobScheduling($arr, $size): void
{
    usort($arr, "sortByProfit");
    $result = array();
    $slot = array_fill(0, $size, false);
    for ($i = 0; $i < $size; $i++) {
        for ($j = min($size, $arr[$i][1]) - 1; $j >= 0; $j--) {
            if ($slot[$j] == false) {
                $result[$j] = $i;
                $slot[$j] = true;
                break;
            }
        }
    }
    for ($i = 0; $i < $size; $i++) {
        if ($slot[$i]) {
            echo $arr[$result[$i]][0] . " ";
        }
    }
}

$arr = [
    ['a', 2, 100],
    ['b', 1, 19],
    ['c', 2, 27],
    ['d', 1, 25],
    ['e', 3, 15]
];

$size = sizeof($arr);
echo "Following is maximum profit sequence of jobs: ";

printJobScheduling($arr, $size);
