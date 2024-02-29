<?php

$size = 4;

function isBipartite($G, $start): bool
{
    global $size;
    $colorArr = array_fill(0, $size, -1);
    $colorArr[$start] = 1;
    $queue = new SplQueue;
    $queue->push($start);
    while (!$queue->isEmpty()) {
        $u = $queue->pop();
        if ($G[$u][$u] == 1) {
            return false;
        }
        for ($v = 0; $v < $size; ++$v) {
            if ($G[$u][$v] && $colorArr[$v] == -1) {
                $colorArr[$v] = 1 - $colorArr[$u];
                $queue->push($v);
            } else if ($G[$u][$v] && $colorArr[$v] == $colorArr[$u]) {
                return false;
            }
        }
    }
    return true;
}

$G = [
    [0, 1, 0, 1],
    [1, 0, 1, 0],
    [0, 1, 0, 1],
    [1, 0, 1, 0]
];

echo isBipartite($G, 0) ? "Yes" : "No";
