<?php

function addEdge(&$list, $u, $v): void
{
    $list[$u][] = $v;
    $list[$v][] = $u;
}

function APUtil($list, $u, &$visited, &$disc, &$low, &$time, &$parent, &$isAP): void
{
    $children = 0;
    $visited[$u] = true;
    $disc[$u] = $low[$u] = ++$time;
    foreach ($list[$u] as $v) {
        if (!$visited[$v]) {
            $children++;
            APUtil($list, $v, $visited, $disc, $low, $time, $u, $isAP);
            $low[$u] = min($low[$u], $low[$v]);
            if ($parent != -1 && $low[$v] >= $disc[$u]) {
                $isAP[$u] = true;
            }
        } else if ($v != $parent) {
            $low[$u] = min($low[$u], $disc[$v]);
        }
    }
    if ($parent == -1 && $children > 1) {
        $isAP[$u] = true;
    }
}

function AP($list, $size): void
{
    $visited = array_fill(0, $size, 0);
    $disc = array_fill(0, $size, 0);
    $isAP = array_fill(0, $size, 0);
    $low = array();
    $time = 0;
    $parent = -1;

    for ($u = 0; $u < $size; $u++) {
        if (!$visited[$u]) {
            APUtil($list, $u, $visited, $disc, $low, $time, $parent, $isAP);
        }
    }

    for ($u = 0; $u < $size; $u++) {
        if ($isAP[$u] == true) {
            echo $u . " ";
        }
    }
}

echo "Articulation points in the graph are: <br/>\n";
$V = 5;
$list = NULL;
addEdge($list, 1, 0);
addEdge($list, 0, 2);
addEdge($list, 2, 1);
addEdge($list, 0, 3);
addEdge($list, 3, 4);
AP($list, $V);
