<?php

define('N', 6);

function BPM($graph, $u, &$seen, &$matchR): bool
{
    for ($v = 0; $v < N; $v++) {
        if (!$seen[$v] && $graph[$u][$v]) {
            $seen[$v] = true;
            if ($matchR[$v] < 0 || BPM($graph, $v, $seen, $matchR)) {
                $matchR[$v] = $u;
                return true;
            }
        }
    }
    return false;
}

function maxBPM($graph): int
{
    $matchR = array_fill(0, N, -1);
    $result = 0;
    for ($u = 0; $u < N; $u++) {
        $seen = array_fill(0, N, 0);
        if (BPM($graph, $u, $seen, $matchR)) {
            $result++;
        }
    }
    return $result;
}

$bpGraph = [
    [0, 1, 1, 0, 0, 0],
    [1, 0, 0, 1, 0, 0],
    [0, 0, 1, 0, 0, 0],
    [0, 0, 1, 1, 0, 0],
    [0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 1]
];

echo "Maximum number of applicants that can get job is " . maxBPM($bpGraph);
