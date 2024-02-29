<?php


function policeThief($arr, $size, $k): int
{
    $pol = -1;
    $theif = -1;
    $res = 0;

    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] == 'P') {
            $pol = $i;
            break;
        }
    }

    for ($i = 0; $i < $size; $i++) {
        if ($arr[$i] == 'T') {
            $theif = $i;
            break;
        }
    }

    if ($pol == -1 || $theif  == -1) {
        return 0;
    }
    while ($pol < $size && $theif < $size) {
        if (abs($pol - $theif) <= $k) {
            $res++;
            $pol++;
            while ($pol < $size && $arr[$pol] != 'P') {
                $pol++;
            }
            $theif++;
            while ($theif < $size && $arr[$theif] != 'P') {
                $theif++;
            }
        } else if ($theif < $pol) {
            $theif++;
            while ($theif < $size && $arr[$theif] != 'P') {
                $theif++;
            }
        } else {
            $pol++;
            while ($pol < $size && $arr[$pol] != 'P') {
                $pol++;
            }
        }
    }
    return $res;
}

$arr = ['P', 'T', 'T', 'P', 'T'];
$k = 2;
$size = sizeof($arr);
echo "Maximum thieves caught: " . policeThief($arr, $size, $k) . "<br/>";
