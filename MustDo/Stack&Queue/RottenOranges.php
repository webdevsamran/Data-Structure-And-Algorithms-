<?php

function rotOranges($arr){
    $n = sizeof($arr);
    $m = sizeof($arr[0]);
    $delrow = [ -1, 0, 1, 0 ];
    $delcol = [ 0, 1, 0, -1 ];
    $vis = array();
    $queue = new SplQueue;
    $cnt_fresh = 0;
    for($i = 0; $i < $n; $i++){
        for($j = 0; $j < $m; $j++){
            if($arr[$i][$j] == 2){
                $queue->enqueue([[$i,$j],0]);
                $vis[$i][$j] = 2;
            }else{
                $vis[$i][$j] = 0;
            }
            if($arr[$i][$j] == 1){
                $cnt_fresh++;
            }
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
        for($i = 0; $i < 4; $i++){
            $nrow = $row + $delrow[$i];
            $ncol = $col + $delcol[$i];

            if($nrow >= 0 && $ncol >= 0 && $nrow < $n && $ncol < $m && $arr[$nrow][$ncol] == 1 && $vis[$nrow][$ncol] != 2){
                $vis[$nrow][$ncol] = 2;
                $queue->enqueue([[$nrow,$ncol],$t+1]);
                $cnt++;
            }
        }
    }
    return $cnt == $cnt_fresh ? $tm : -1;
}

$arr = [ [ 0, 1, 2 ], [ 0, 1, 2 ], [ 2, 1, 1 ] ];
$ans = rotOranges($arr);
if ($ans == -1)
    echo "All oranges cannot rot";
else
    echo "Time required for all oranges to rot => " . $ans;