<?php

function root($arr, $i): int
{
    while ($arr[$i] != $i) {
        $arr[$i] = $arr[$arr[$i]];
        $i = $arr[$i];
    }
    return $i;
}

function areSame($arr, $x, $y): bool
{
    return (root($arr, $x) == root($arr, $y));
}

function weightedUnion(&$arr, &$rank, $x, $y): void
{
    $root_x = root($arr, $x);
    $root_y = root($arr, $y);
    if ($rank[$root_x] < $rank[$root_y]) {
        $arr[$root_x] = $arr[$root_y];
        $rank[$root_y] += $rank[$root_x];
    } else {
        $arr[$root_y] = $arr[$root_x];
        $rank[$root_x] += $rank[$root_y];
    }
}

function query($type, $x, $y, &$arr, &$rank): void
{
    if ($type == 1) {
        if (areSame($arr, $x, $y)) {
            echo "Yes! <br/>";
        } else {
            echo "No! <br/>";
        }
    } else if ($type == 2) {
        if (!areSame($arr, $x, $y)) {
            weightedUnion($arr, $rank, $x, $y);
        }
    }
}

$n = 7;
$arr = array();
$rank = array();
for ($i = 0; $i < $n; $i++) {
    $arr[$i] = $i;
    $rank[$i] = 1;
}

$q = 11;
query(1, 0, 1, $arr, $rank);
query(2, 0, 1, $arr, $rank);
query(2, 1, 2, $arr, $rank);
query(1, 0, 2, $arr, $rank);
query(2, 0, 2, $arr, $rank);
query(2, 2, 3, $arr, $rank);
query(2, 3, 4, $arr, $rank);
query(1, 0, 5, $arr, $rank);
query(2, 4, 5, $arr, $rank);
query(2, 5, 6, $arr, $rank);
query(1, 2, 6, $arr, $rank);
