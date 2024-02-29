<?php

function bubbleSort(array &$arr): void
{
    $size = sizeof($arr);
    $is_swapped = false;
    for ($i = 0; $i < $size - 1; $i++) {
        for ($j = $i + 1; $j < $size; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $is_swapped = true;
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
        if (!$is_swapped) {
            return;
        }
    }
}

function possibleTriangles(array &$arr): int
{
    bubbleSort($arr);
    $count = 0;
    $size = sizeof($arr);
    for ($i = $size - 1; $i >= 1; $i--) {
        $l = 0;
        $r = $i - 1;
        while ($l < $r) {
            if ($arr[$l] + $arr[$r] > $arr[$i]) {
                $count += $r - $l;
                $r--;
            } else {
                $l++;
            }
        }
    }
    return $count;
}

$arr = [10, 22, 21, 100, 101, 200, 300];
echo "Possible Combinations are:- " . possibleTriangles($arr);
