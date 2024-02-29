<?php

function distinctElement($arr, $k)
{
    $temp = array();
    $size = sizeof($arr);
    for ($i = 0; $i < $size; $i++) {
        if (!array_key_exists($arr[$i], $temp)) {
            $temp[$arr[$i]] = 0;
        }
        $temp[$arr[$i]]++;
    }
    $i = 0;
    foreach ($temp as $key => $val) {
        if ($val == 1) {
            $i++;
            if ($i == $k) {
                echo $key . " is the distinct Element.<br/>";
                return;
            }
        }
    }
    echo "-1";
    return;
}

$arr1 = [1, 2, 1, 3, 4, 2];
distinctElement($arr1, 2);
$arr2 = [1, 2, 50, 10, 20, 2];
distinctElement($arr2, 3);
$arr3 = [2, 2, 2, 2];
distinctElement($arr3, 2);
