<?php

define('INFF', 99999999);
define('MAXR', 12);
define('MAXC', 12);
define('MAXMASK', 2048);
define('MAXHOUSE', 12);

$dist = array();
$X = [-1, 0, 0, 1];
$Y = [0, 1, -1, 0];
$char = array();

function safe($x, $y, $r, $c, $arr)
{
    if ($x >= $r || $y >= $c || $x < 0 || $y < 0) {
        return false;
    }
    if ($arr[$x][$y] == '#') {
        return false;
    }
    return true;
}

function getDist($idx, $r, $c, $dirty, $arr)
{
    global $X;
    global $Y;
    global $dist;

    $visited = array_fill(0, 21, array_fill(0, 21, 0));

    $cx = $dirty[$idx][0];
    $cy = $dirty[$idx][1];

    $queue = new SplQueue;
    $queue->enqueue([$cx, $cy]);

    for ($i = 0; $i <= $r; $i++) {
        for ($j = 0; $j <= $c; $j++) {
            $dist[$i][$j][$idx] = INFF;
        }
    }

    $visited[$cx][$cy] = 1;
    $dist[$cx][$cy][$idx] = 0;

    while (!$queue->isEmpty()) {
        $x = $queue->dequeue();
        for ($i = 0; $i < 4; $i++) {
            $cx = $x[0] + $X[$i];
            $cy = $x[1] + $Y[$i];
            if (safe($cx, $cy, $r, $c, $arr)) {
                if ($visited[$cx][$cy]) {
                    continue;
                }
                $visited[$cx][$cy] = 1;
                $dist[$cx][$cy][$idx] = $dist[$x[0]][$x[1]][$idx] + 1;
                $queue->enqueue([$cx, $cy]);
            }
        }
    }
}

function solve($idx, $mask, $len, $limit, $dirty, &$dp)
{
    global $dist;

    if ($mask == $limit) {
        return $dist[0][0][$idx];
    }

    if ($dp[$idx][$mask] != -1) {
        return $dp[$idx][$mask];
    }

    $ret = PHP_INT_MAX;

    for ($i = 0; $i < $len; $i++) {
        if (($mask & (1 << $i)) == 0) {
            $newMask = $mask | (1 << $i);
            $ret = min($ret, solve($i, $newMask, $len, $limit, $dirty, $dp) + $dist[$dirty[$i][0]][$dirty[$i][1]][$idx]);
        }
    }
    return $dp[$idx][$mask] = $ret;
}

function init($arr)
{
    $dp = array_fill(0, MAXHOUSE, array_fill(0, MAXMASK, -1));
    $r = sizeof($arr);
    $c = sizeof($arr[0]);
    $dirty = array();

    for ($i = 0; $i < $r; $i++) {
        for ($j = 0; $j < $c; $j++) {
            if ($arr[$i][$j] == '*') {
                array_push($dirty, [$i, $j]);
            }
        }
    }

    array_unshift($dirty, [0, 0]);
    $len = sizeof($dirty);
    $limit = (1 << $len) - 1;

    for ($i = 0; $i < $len; $i++) {
        getDist($i,  $r, $c, $dirty, $arr);
    }

    return solve(0, 1, $len, $limit, $dirty, $dp);
}

$A = [
    ['.', '.', '.', '.', '.', '*', '.'],
    ['.', '.', '.', '#', '.', '.', '.'],
    ['.', '*', '.', '#', '.', '*', '.'],
    ['.', '.', '.', '.', '.', '.', '.']
];

$r = 4;
$c = 7;

echo "The given grid : <br/>";

for ($i = 0; $i < $r; $i++) {
    for ($j = 0; $j < $c; $j++) {
        echo " " . $A[$i][$j] . " ";
        $arr[$i][$j] = $A[$i][$j];
    }
    echo "<br/>";
}

$ans = init($arr);

echo "Minimum distance for the given grid : ";
echo $ans . "<br/>";
