<?php

define('MAX', 10);
define('MOD', 1000000007);

function multiply($a, $b, &$c): void
{
    for ($i = 0; $i < MAX; $i++) {
        for ($j = 0; $j < MAX; $j++) {
            for ($k = 0; $k < MAX; $k++) {
                $c[$i][$j] = ($c[$i][$j] + ($a[$i][$k] * $b[$k][$j]) % MOD) % MOD;
            }
        }
    }
}

function mat_pow(&$a, $size, &$result): void
{
    $temp = array();
    for ($i = 0; $i < MAX; $i++) {
        for ($j = 0; $j < MAX; $j++) {
            $result[$i][$j] = ($i == $j) ? 1: 0;
        }
    }
    while ($size > 0) {
        if ($size % 2 == 1) {
            multiply($a, $result, $temp);
            for ($i = 0; $i < MAX; $i++) {
                for ($j = 0; $j < MAX; $j++) {
                    $result[$i][$j] = $temp[$i][$j];
                }
            }
        }
        $size = $size / 2;
        multiply($a, $a, $temp);
        for ($i = 0; $i < MAX; $i++) {
            for ($j = 0; $j < MAX; $j++) {
                $a[$i][$j] = $temp[$i][$j];
            }
        }
    }
}

function numOfSpanningTree($graph, $V): int
{
    $temp = array();
    $result = array();

    for ($i = 0; $i < $V; $i++) {
        for ($j = 0; $j < $V; $j++) {
            $temp[$i][$j] = $graph[$i][$j];
        }
    }

    mat_pow($temp, $V - 2, $result);

    $ans = 0;

    for ($i = 0; $i < $V; $i++) {
        for ($j = 0; $j < $V; $j++) {
            $ans = ($ans + $result[$i][$j]) % MOD;
        }
    }

    return $ans;
}

$V = 4;
$E = 5;
$graph = [
    [0, 1, 1, 1],
    [1, 0, 1, 1],
    [1, 1, 0, 1],
    [1, 1, 1, 0]
];

echo numOfSpanningTree($graph, $V);
