<?php

function findTriple(array $arr, int $sum): void
{
    $size = sizeof($arr);
    sort($arr);
    for ($i = 0; $i < $size - 2; $i++) {
        $l = $i + 1;
        $r = $size - 1;
        while ($l < $r) {
            if ($arr[$i] + $arr[$l] + $arr[$r] == $sum) {
                echo "Triplet Found and is : " . $arr[$i] . " " . $arr[$l] . " " . $arr[$r];
                return;
            } else if ($arr[$i] + $arr[$l] + $arr[$r] < $sum) {
                $l++;
            } else {
                $r--;
            }
        }
    }
    echo "No Triplet Found";
    return;
}

$arr = [1, 4, 45, 6, 10, 8];
findTriple($arr, 50);
