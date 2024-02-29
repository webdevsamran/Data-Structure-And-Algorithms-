<?php

function findSubarray(array &$arr, int $sum): void
{
    $size = sizeof($arr);
    $start = 0;
    $currentSum = $arr[0];
    for ($i = 1; $i < $size; $i++) {
        while ($currentSum > $sum && $i < $size) {
            $currentSum -= $arr[$start];
            $start++;
        }
        if ($currentSum == $sum) {
            echo "Subarray is Found From " . $start . " to " . $i - 1;
            return;
        }
        $currentSum += $arr[$i];
    }
    return;
}

$arr = [15, 2, 4, 8, 9, 5, 10, 23];
findSubarray($arr, 23);
