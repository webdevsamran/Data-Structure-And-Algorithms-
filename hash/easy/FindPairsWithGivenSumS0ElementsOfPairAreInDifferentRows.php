<?php

function findPairs($arr, $sum): void
{
    $m = sizeof($arr);
    $n = sizeof($arr[0]);
    $temp = array();
    for ($i = 0; $i < $m; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $res = $sum - $arr[$i][$j];
            if (array_key_exists($res, $temp)) {
                $row = $temp[$res];
                if ($row != $i) {
                    echo "(" . $arr[$i][$j] . "," . $res . ") ";
                }
            }
            $temp[($arr[$i][$j])] = $i;
        }
    }
}

$arr = [
    [1, 3, 2, 4],
    [5, 8, 7, 6],
    [9, 10, 13, 11],
    [12, 0, 14, 15]
];
findPairs($arr, 11);
