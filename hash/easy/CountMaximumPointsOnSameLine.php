<?php

function countMaximumPointsOnLine($points): int
{
    $size = sizeof($points);

    if ($size < 2) {
        return $size;
    }

    $maxPoint = 0;
    $curMax = NULL;
    $overLappingPoints = NULL;
    $verticalPoints = NULL;
    $slopeMap = array();

    for ($i = 0; $i < $size; $i++) {
        $curMax = 0;
        $overLappingPoints = 0;
        $verticalPoints = 0;
        for ($j = $i + 1; $j < $size; $j++) {
            if ($points[$i] == $points[$j]) {
                $overLappingPoints++;
            } else if ($points[$i][0] == $points[$j][0]) {
                $verticalPoints++;
            } else {
                $yDiff = $points[$j][1] - $points[$i][1];
                $xDiff = $points[$j][0] - $points[$i][0];
                $gcd = (int)(gmp_strval(gmp_gcd($xDiff, $yDiff)));
                $yDiff /= $gcd;
                $xDiff /= $gcd;

                $key = (string)($yDiff . "," . $xDiff);
                $slopeMap[$key]++;
                $curMax = max($curMax, $slopeMap[$key]);
            }
            $curMax = max($curMax, $verticalPoints);
        }
        $maxPoint = max($maxPoint, $curMax + $overLappingPoints + 1);
        $slopeMap = array();
    }
    return $maxPoint;
}

$points = [
    [-1, 1],
    [0, 0],
    [1, 1],
    [2, 2],
    [3, 3],
    [3, 4]
];
echo countMaximumPointsOnLine($points);
