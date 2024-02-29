<?php

function checkJobs($start, $end, $size): bool
{
    $temp = array();
    for ($i = 0; $i < $size; $i++) {
        array_push($temp, [$start[$i], $end[$i]]);
    }
    sort($temp);
    $tv1 = $temp[0][1];
    $tv2 = $temp[1][1];

    for ($i = 2; $i < $size; $i++) {
        if ($temp[$i][0] >= $tv1) {
            $tv1 = $tv2;
            $tv2 = $temp[$i][1];
        } else if ($temp[$i][0] >= $tv2) {
            $tv2 = $temp[$i][1];
        } else {
            return false;
        }
    }
    return true;
}

$startin = [1, 2, 4];
$endin = [2, 3, 5];
$n = sizeof($startin);
echo checkJobs($startin, $endin, $n);
