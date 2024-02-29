<?php

function addEdge(&$arr, $v, $w): void
{
    $arr[$v][] = $w;
    $arr[$w][] = $v;
}

function isCyclicConnected($arr, $i, $V, &$visited): bool
{
    $parent = array_fill(0, $V, -1);
    $visited[$i] = true;
    $queue = new SplQueue;
    $queue->push($i);
    while (!$queue->isEmpty()) {
        $u = $queue->pop();
        foreach ($arr[$u] as $val) {
            if (!$visited[$val]) {
                $visited[$val] = true;
                $queue->push($val);
                $parent[$val] = $u;
            } else if ($parent[$u] != $val) {
                return true;
            }
        }
    }
    return false;
}

function isCyclicDisconnected($arr, $V): bool
{
    $visited = array_fill(0, $V, false);
    for ($i = 0; $i < $V; $i++) {
        if (!$visited[$i] && isCyclicConnected($arr, $i, $V, $visited)) {
            return true;
        }
    }
    return false;
}

$V = 4;
$adj = array();
addEdge($adj, 0, 1);
addEdge($adj, 1, 2);
addEdge($adj, 2, 0);
addEdge($adj, 2, 3);

if (isCyclicDisconnected($adj, $V))
    echo "Yes";
else
    echo "No";
