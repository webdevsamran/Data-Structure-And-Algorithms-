<?php

define('size',5);

function isSafe($matrix,$x,$y,$visited){
    return ($x >= 0 && $y >= 0 && $x < size && $y < size && $matrix[$x][$y] && !$visited[$x][$y]);
}

function BFS($matrix,&$visited,$x,$y){
    $row = [ -1, -1, -1, 0, 0, 1, 1, 1 ];
    $col = [ -1, 0, 1, -1, 1, -1, 0, 1 ];

    $queue = new SplQueue;
    $queue->enqueue([$x,$y]);
    $visited[$x][$y] = 1;

    while(!$queue->isEmpty()){
        $dis = $queue->dequeue();
        $x = $dis[0];
        $y = $dis[1];

        for($k = 0; $k < 8; $k++){
            if(isSafe($matrix,$x+$row[$k],$y+$col[$k],$visited)){
                $visited[$x+$row[$k]][$y+$col[$k]] = 1;
                $queue->enqueue([$x+$row[$k],$y+$col[$k]]);
            }
        }
    }
}

function countIslands($matrix){

    $visited = array_fill(0,size,array_fill(0,size,0));
    $res = 0;

    for($i = 0; $i < size; $i++){
        for($j = 0; $j < size; $j++){
            if($matrix[$i][$j] && !$visited[$i][$j]){
                BFS($matrix,$visited,$i,$j);
                $res++;
            }
        }
    }
    return $res;
}

$mat = [ 
    [ 1, 1, 0, 0, 0 ],
    [ 0, 1, 0, 0, 1 ],
    [ 1, 0, 0, 1, 1 ],
    [ 0, 0, 0, 0, 0 ],
    [ 1, 0, 1, 0, 1 ]
];

echo countIslands($mat);