<?php

define('R',12);
define('C',10);

class key{
    public $x;
    public $y;

    function __construct($x = NULL,$y = NULL)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

$rowNum = [ -1, 0, 0, 1 ];
$colNum = [ 0, -1, 1, 0 ];

function isValid($x, $y)
{
    if ($x < R && $y < C && $x >= 0 && $y >= 0)
        return true;
    return false;
}

function findShortestPath($mat){
    global $rowNum;
    global $colNum;
    for($i = 0; $i < R; $i++){
        for($j = 0; $j < C; $j++){
            if($mat[$i][$j] == 0){
                for($k = 0; $k < 4; $k++){
                    if(isValid($i + $rowNum[$k],$j + $colNum[$k])){
                        $mat[$i + $rowNum[$k]][$j + $colNum[$k]] = -1;
                    }
                }
            }
        }
    }
    for($i = 0; $i < R; $i++){
        for($j = 0; $j < C; $j++){
            if($mat[$i][$j] == -1){
                $mat[$i][$j] = 0;
            }
        }
    }
    $dist = array_fill(0,R,array_fill(0,C,-1));
    $queue = new SplQueue;
    for($i = 0; $i < R; $i++){
        if($mat[$i][0] == 1){
            $queue->enqueue(new key($i,0));
            $dist[$i][0] = 0;
        }
    }
    while(!$queue->isEmpty()){
        $k = $queue->dequeue();
        $x = $k->x;
        $y = $k->y;
        $d = $dist[$x][$y];
        for($k = 0; $k < 4; $k++){
            $xp = $x + $rowNum[$k];
            $yp = $y + $colNum[$k];
            if(isValid($xp,$yp) && $dist[$xp][$yp] == -1 && $mat[$xp][$yp] == 1){
                $dist[$xp][$yp] = $d + 1;
                $queue->enqueue(new key($xp,$yp));
            }
        }
    }
    $ans = PHP_INT_MAX;
    for($i = 0; $i < R; $i++){
        if($mat[$i][C-1] == 1 && $dist[$i][C-1] != -1){
            $ans = min($ans,$dist[$i][C-1]);
        }
    }
    if($ans == PHP_INT_MAX)
        echo "NOT POSSIBLE";
    else
        echo "Length of shortest safe route is " . $ans;
}

$mat =
    [
        [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
        [ 1, 0, 1, 1, 1, 1, 1, 1, 1, 1 ],
        [ 1, 1, 1, 0, 1, 1, 1, 1, 1, 1 ],
        [ 1, 1, 1, 1, 0, 1, 1, 1, 1, 1 ],
        [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
        [ 1, 1, 1, 1, 1, 0, 1, 1, 1, 1 ],
        [ 1, 0, 1, 1, 1, 1, 1, 1, 0, 1 ],
        [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
        [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
        [ 0, 1, 1, 1, 1, 0, 1, 1, 1, 1 ],
        [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
        [ 1, 1, 1, 0, 1, 1, 1, 1, 1, 1 ]
    ];
     
findShortestPath($mat);