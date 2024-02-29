<?php

define('R',3);
define('C',5);

function rotOranges($arr){
    $m = sizeof($arr);
    $n = sizeof($arr[0]);

    $delrow = [ -1, 0, 1, 0 ];
    $delcol = [ 0, 1, 0, -1 ];

    $vis = array();
    $queue = new SplQueue;
    $cntFresh = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $m; $j++) {
            if ($arr[$i][$j] == 2) {
                $queue->enqueue([ [ $i, $j ] , 0]);
                $vis[$i][$j] = 2;
            } else {
                $vis[$i][$j] = 0;
            }
            if ($arr[$i][$j] == 1)
                $cntFresh++;
        }
    }
    $cnt = 0;
    $tm = 0;

    while(!$queue->isEmpty()){
        $item = $queue->dequeue();
        $row = $item[0][0];
        $col = $item[0][1];
        $t = $item[1];
        $tm = max($tm, $t);
        for ($i = 0; $i < 4; $i++) {
            $nrow = $row + $delrow[$i];
            $ncol = $col + $delcol[$i];
            if ($nrow >= 0 && $nrow < $n && $ncol >= 0 && $ncol < $m && $arr[$nrow][$ncol] == 1 && $vis[$nrow][$ncol] != 2) {
                $vis[$nrow][$ncol] = 2;
                $queue->enqueue([[$nrow,$ncol],$t+1]);
                $cnt++;
            }
        }
    }

    return ($cnt == $cntFresh) ? $tm : -1;
}

$arr = [ [ 1, 1, 2 ], [ 0, 1, 2 ], [ 2, 1, 1 ] ];
$ans = rotOranges($arr);
if ($ans == -1)
    echo "All oranges cannot rot.";
else
    echo "Time required for all oranges to rot => " . $ans;