<?php

function findFirstMissingNumber(array &$arr, int $range): void
{
    $size = sizeof($arr);
    $temp = array();
    for ($i = 0; $i <= $range; $i++) {
        $temp[$i] = -1;
    }
    for ($i = 0; $i < $size; $i++) {
        $temp[$arr[$i]] = $arr[$i];
    }
    for ($i = 0; $i < $range; $i++) {
        if ($temp[$i] == -1) {
            echo "Nimber missing is " . $i;
            return;
        }
    }
}

$arr = [0, 1, 2, 4, 5];
findFirstMissingNumber($arr, 6);
