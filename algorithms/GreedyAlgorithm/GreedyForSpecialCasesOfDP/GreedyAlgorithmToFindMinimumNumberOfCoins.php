<?php

$denomination = [1, 2, 5, 10, 20, 50, 100, 500, 1000];
$size = sizeof($denomination);

function findMin($n): void
{
    global $size;
    global $denomination;
    sort($denomination, SORT_ASC);
    $ans = array();
    for ($i = $size - 1; $i >= 0; $i--) {
        while ($n >= $denomination[$i]) {
            $n -= $denomination[$i];
            array_push($ans, $denomination[$i]);
        }
    }

    for ($i = 0; $i < sizeof($ans); $i++) {
        echo $ans[$i] . " ";
    }
}

$n = 93;
echo "Following is minimal number of change for " . $n . ": ";
findMin($n);
