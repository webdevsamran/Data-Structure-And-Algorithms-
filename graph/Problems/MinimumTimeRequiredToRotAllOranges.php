<?php

define('R',3);
define('C',5);

function rotOranges($grid){
    $n = sizeof($grid);
    $m = sizeof($grid[0]);

    $delrow = [ -1, 0, 1, 0 ];
    $delcol = [ 0, 1, 0, -1 ];

    $vis = array();
    $cntfresh = 0;
    $q = new SplQueue;

    for($i = 0; $i < $n; $i++){
        for($j = 0; $j < $m; $j++){
            if($grid[$i][$j] == 2){
                $q->enqueue([[$i,$j],1]);
                $vis[$i][$j] = 2;
            }else{
                $vis[$i][$j] = 0;
            }
            if($grid[$i][$j] == 1){
                $cntfresh++;
            }
        }
    }
    echo $cntfresh;

    $cnt = 0;
    $tm = 0;

    while(!$q->isEmpty()){
        $item = $q->dequeue();
        $row = $item[0][0];
        $col = $item[0][1];
        $time = $item[1];

        $tm = max($tm,$time);

        for($i = 0; $i < 4; $i++){
            $nRow = $row + $delrow[$i];
            $nCol = $col + $delcol[$i];

            if($nRow >= 0 && $nCol >= 0 && $nRow < $n && $nCol < $m && $grid[$nRow][$nCol] == 1 && $vis[$nRow][$nCol] != 2){
                $vis[$nRow][$nCol] = 2;
                $q->enqueue([[$nRow,$nCol],$time+1]);
                $cnt++;
            }
        }
    }

    return ($cnt == $cntfresh) ? $tm : -1;
}

$arr = [ 
    [ 0, 1, 2 ], 
    [ 0, 1, 2 ], 
    [ 2, 1, 1 ] 
];
$ans = rotOranges($arr);
echo ($ans == -1) ? "All oranges cannot rotn": "Time required for all oranges to rot => " . $ans . "<br/>";