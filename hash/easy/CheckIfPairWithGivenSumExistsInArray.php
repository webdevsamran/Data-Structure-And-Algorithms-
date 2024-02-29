<?php

function findPairs($arr, $number): void
{
    $temp = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        $res = $number - $arr[$i];
        if (in_array($res, $temp)) {
            echo "Yes";
            return;
        }
        $temp[$i] = $arr[$i];
    }
    echo "Not Found!";
    return;
}

$arr = [1, 4, 45, 6, 10, 8];
$number = 16;
findPairs($arr, $number);
