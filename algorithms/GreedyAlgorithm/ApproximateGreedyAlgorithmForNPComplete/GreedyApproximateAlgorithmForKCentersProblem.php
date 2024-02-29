<?php


function maxIndex($dist, $size): int
{
    $mi = 0;
    for ($i = 0; $i < $size; $i++) {
        if ($dist[$i] > $dist[$mi]) {
            $mi = $i;
        }
    }
    return $mi;
}

function selectKcities($size, $weights, $k): void
{
    $dist = array_fill(0, $size, PHP_INT_MAX);
    $centers = array();
    $max = 0;
    for ($i = 0; $i < $k; $i++) {
        array_push($centers, $max);
        for ($j = 0; $j < $size; $j++) {
            $dist[$j] = min($dist[$j], $weights[$max][$j]);
        }
        $max = maxIndex($dist, $size);
    }
    echo $dist[$max] . "<br/>";
    for ($i = 0; $i < sizeof($centers); $i++) {
        echo $centers[$i] . " ";
    }
    echo "<br/>";
}

$n = 4;
$weights = [
    [0, 4, 8, 5],
    [4, 0, 10, 7],
    [8, 10, 0, 9],
    [5, 7, 9, 0]
];
$k = 2;

// Function Call
selectKcities($n, $weights, $k);
