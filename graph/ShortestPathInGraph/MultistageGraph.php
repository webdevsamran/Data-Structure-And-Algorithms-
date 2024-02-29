<?php

define('N', 8);

function shortestDist($graph): int
{
    $dist = array();
    $dist[N - 1] = 0;
    for ($i = N - 2; $i >= 0; $i--) {
        $dist[$i] = PHP_INT_MAX;
        for ($j = $i; $j < N; $j++) {
            if ($graph[$i][$j] == 'INF') {
                continue;
            }
            $dist[$i] = min($dist[$i], $graph[$i][$j] + $dist[$j]);
        }
    }
    return $dist[0];
}

$graph =
    [
        ['INF', 1, 2, 5, 'INF', 'INF', 'INF', 'INF'],
        ['INF', 'INF', 'INF', 'INF', 4, 11, 'INF', 'INF'],
        ['INF', 'INF', 'INF', 'INF', 9, 5, 16, 'INF'],
        ['INF', 'INF', 'INF', 'INF', 'INF', 'INF', 2, 'INF'],
        ['INF', 'INF', 'INF', 'INF', 'INF', 'INF', 'INF', 18],
        ['INF', 'INF', 'INF', 'INF', 'INF', 'INF', 'INF', 13],
        ['INF', 'INF', 'INF', 'INF', 'INF', 'INF', 'INF', 2],
        ['INF', 'INF', 'INF', 'INF', 'INF', 'INF', 'INF', 'INF']
    ];

echo shortestDist($graph);
