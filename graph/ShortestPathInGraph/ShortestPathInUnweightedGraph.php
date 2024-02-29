<?php

function addEdge(&$list, $u, $v): void
{
    $list[$u][] = $v;
    $list[$v][] = $u;
}

function BFS($list, $src, $dest, $size, &$pred, &$dist): bool
{
    $queue = new SplQueue;
    $visited = array();
    for ($i = 0; $i < $size; $i++) {
        $visited[$i] = false;
        $pred[$i] = -1;
        $dist[$i] = PHP_INT_MAX;
    }
    $visited[$src] = true;
    $dist[$src] = 0;
    $queue->enqueue($src);
    while (!$queue->isEmpty()) {
        $u = $queue->dequeue();
        for ($i = 0; $i < sizeof($list[$u]); $i++) {
            if (!$visited[$list[$u][$i]]) {
                $visited[$list[$u][$i]] = true;
                $dist[$list[$u][$i]] = $dist[$u] + 1;
                $pred[$list[$u][$i]] = $u;
                $queue->enqueue($list[$u][$i]);
                if ($list[$u][$i] == $dest) {
                    return true;
                }
            }
        }
    }
    return false;
}

function printShortestDistance($list, $src, $des, $size): void
{
    $pred = array();
    $dist = array();
    if (BFS($list, $src, $des, $size, $pred, $dist) == false) {
        echo "Source and Destination are not Connected.<br/>";
        return;
    }
    $path = array();
    $crawl = $des;
    $path[] = $crawl;
    while ($pred[$crawl] != -1) {
        $path[] = $pred[$crawl];
        $crawl = $pred[$crawl];
    }

    echo "Shortest Path length is: " . $dist[$des];
    for ($i = sizeof($path) - 1; $i >= 0; $i--) {
        echo $path[$i] . " ";
    }
}

$v = 8;
$list = array();
addEdge($list, 0, 1);
addEdge($list, 0, 3);
addEdge($list, 1, 2);
addEdge($list, 3, 4);
addEdge($list, 3, 7);
addEdge($list, 4, 5);
addEdge($list, 4, 6);
addEdge($list, 4, 7);
addEdge($list, 5, 6);
addEdge($list, 6, 7);
$source = 0;
$dest = 7;
printShortestDistance($list, $source, $dest, $v);
