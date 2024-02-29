<?php

define('SIZE',5);

class cell{
    public $x;
    public $y;
    public $distance;

    function __construct($x,$y,$distance)
    {
        $this->x = $x;
        $this->y = $y;
        $this->distance = $distance;
    }
}

function isInsideGrid($x,$y){
    return ($x >= 0 && $x < SIZE && $y >= 0 && $y < SIZE);
}

function shortest($grid,$row,$col){
    $dist = array_fill(0,$row,array_fill(0,$col,PHP_INT_MAX));
    $dx = [ -1, 0, 1, 0 ];
    $dy = [ 0, 1, 0, -1 ];
    $st = array();
    array_push($st,new cell(0,0,0));
    $dist[0][0] = $grid[0][0];
    while(!empty($st)){
        $k = array_shift($st);
        for($i = 0; $i < 4; $i++){
            $x = $k->x + $dx[$i];
            $y = $k->y + $dy[$i];
            if(!isInsideGrid($x,$y)){
                continue;
            }
            if($dist[$x][$y] > $dist[$k->x][$k->y] + $grid[$x][$y]){
                $dist[$x][$y] = $dist[$k->x][$k->y] + $grid[$x][$y];
                array_push($st,new cell($x,$y,$dist[$x][$y]));
            }
        }
    }
    return $dist[SIZE - 1][SIZE - 1];
}

$grid= [ 
    [31, 100, 65,  12,  18],
    [10, 13, 47,  157, 6],
    [100, 113, 174, 11,  33],
    [88, 124, 41, 20, 140],
    [99,  32,  111, 41, 20 ]
];

echo shortest($grid, SIZE, SIZE);