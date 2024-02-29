<?php

define('V', 4);

function countwalks($graph, $u, $v, $k): int
{
    $count = array();

    for ($e = 0; $e <= $k; $e++) {
        for ($i = 0; $i < V; $i++) {
            for ($j = 0; $j < V; $j++) {
                $count[$i][$j][$e] = 0;
                if ($e == 0 && $i == $j) {
                    $count[$i][$j][$e] = 1;
                }
                if ($e == 1 && $graph[$i][$j]) {
                    $count[$i][$j][$e] = 1;
                }
                if ($e > 1) {
                    for ($a = 0; $a < V; $a++) {
                        if ($graph[$i][$a]) {
                            $count[$i][$j][$e] += $count[$a][$j][$e - 1];
                        }
                    }
                }
            }
        }
    }
    echo "<pre>";
    print_r($count);
    echo "</pre>";
    return $count[$u][$v][$k];
}

$graph = [
    [0, 1, 1, 1],
    [0, 0, 0, 1],
    [0, 0, 0, 1],
    [0, 0, 0, 0]
];
$u = 0;
$v = 3;
$k = 2;
echo countwalks($graph, $u, $v, $k);
