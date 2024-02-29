<?php

function majorityElement(array &$arr): void
{
    $size = sizeof($arr);
    $maj_cri = (int)($size / 2);
    $count = array();
    for ($i = 0; $i < $size; $i++) {
        $count[$i] = 0;
    }
    for ($i = 0; $i < $size; $i++) {
        $count[$arr[$i]]++;
    }
    $maj_ele = NULL;
    foreach ($count as $key => $val) {
        if ($val > $maj_cri) {
            echo $key;
            return;
        }
    }
    echo "Not Found";
    return;
}

$arr = [1, 3, 3, 1, 2];
majorityElement($arr);
