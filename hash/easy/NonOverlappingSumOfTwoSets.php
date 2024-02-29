<?php

function nonOverlappingSum($arr1, $arr2): void
{
    $count = array();
    $sum = 0;
    for ($i = 0; $i < sizeof($arr1); $i++) {
        $count[$arr1[$i]] = 1;
        $sum += $arr1[$i];
    }
    for ($i = 0; $i < sizeof($arr2); $i++) {
        if (array_key_exists($arr2[$i], $count)) {
            $sum -= $arr2[$i];
            continue;
        }
        $count[$arr2[$i]] = 1;
        $sum += $arr2[$i];
    }
    echo "Sum is: " . $sum;
    return;
}

$arr1 = [1, 5, 3, 8];
$arr2 = [5, 4, 6, 7];
nonOverlappingSum($arr1, $arr2);
