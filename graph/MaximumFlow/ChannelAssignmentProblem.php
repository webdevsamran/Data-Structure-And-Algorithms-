<?php

define('M', 3);
define('N', 4);

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

function maxBPM($graph): void
{
    $matchR = array_fill(0, N, -1);
    $result = 0;
    for ($u = 0; $u < M; $u++) {
        $seen = array_fill(0, N, 0);
        if (BPM($graph, $u, $seen, $matchR)) {
            $result++;
        }
    }
    echo "The number of maximum packets sent in the time slot is " . $result . "<br/>";
    for ($x = 0; $x < N; $x++)
        if ($matchR[$x] + 1 != 0)
            echo "T" . $matchR[$x] + 1 . "-> R" . $x + 1 . "<br/>";
}

$table = [[0, 2, 0], [3, 0, 1], [2, 4, 0]];
maxBPM($table);
