<?php

function countRotation(array &$arr): int
{
    $size = sizeof($arr);
    $min_val = $arr[0];
    $total_rotation = 0;
    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] > $min_val) {
            $min_val = $arr[$i];
            $total_rotation += 1;
        }
    }
    return $total_rotation + 1;
}

$arr = [15, 18, 2, 3, 6, 12];
$total_rotation = countRotation($arr);
echo "Total Rotations are: " . $total_rotation;
