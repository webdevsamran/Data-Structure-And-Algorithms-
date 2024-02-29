<?php

function leadersInArray(array &$arr): void
{
    $size = sizeof($arr);
    $max_from_right = $arr[$size - 1];
    echo "Leaders are: " . $max_from_right;
    for ($i = $size - 2; $i >= 0; $i--) {
        if ($arr[$i] > $max_from_right) {
            $max_from_right = $arr[$i];
            echo " " . $max_from_right;
        }
    }
}

$arr = [16, 17, 4, 3, 5, 2];
leadersInArray($arr);
