<?php

function assignHole($mices, $holes, $n, $m): int
{
    if ($n != $m) {
        return -1;
    }
    sort($mices);
    sort($holes);

    $max = 0;

    for ($i = 0; $i < $n; $i++) {
        if ($max < abs($mices[$i] - $holes[$i])) {
            $max = abs($mices[$i] - $holes[$i]);
        }
    }

    return $max;
}

$mices = [4, -4, 2];
$holes = [4, 0, 5];
$n = sizeof($mices);
$m = sizeof($holes);
$minTime = assignHole($mices, $holes, $n, $m);
echo "The last mouse gets into the hole in time:" . $minTime . "<br/>";
