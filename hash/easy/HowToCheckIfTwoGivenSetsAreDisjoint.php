<?php

function checkIfDisjoint($arr1, $arr2): void
{
    $count = array();
    for ($i = 0; $i < sizeof($arr1); $i++) {
        $count[$arr1[$i]] = 1;
    }
    for ($i = 0; $i < sizeof($arr2); $i++) {
        if (array_key_exists($arr2[$i], $count)) {
            echo "Not Disjoint Becasue of: " . $arr2[$i];
            return;
        }
    }
    echo "Yes! It is Disjoint";
    return;
}

$arr1 = [12, 34, 11, 9, 3];
$arr2 = [7, 2, 1, 5];
checkIfDisjoint($arr1, $arr2);
