<?php

class cell{
    public $x;
    public $y;
    public $dis;

    function __construct($x,$y,$dis)
    {
        $this->x = $x;
        $this->y = $y;
        $this->dis = $dis;
    }
}

function isSafe($x,$y,$N){
    if($x >= 1 && $y >= 1 && $x <= $N && $y <= $N){
        return true;
    }
    return false;
}

function minStepToReachTarget($knightPos,$targetPos,$N){
    $dx = [ -2, -1, 1, 2, -2, -1, 1, 2 ];
    $dy = [ -1, -2, -2, -1, 1, 2, 2, 1 ];
    $queue = new SplQueue;
    $queue->enqueue(new cell($knightPos[0],$knightPos[1],0));
    $visited = array_fill(0,$N+1,array_fill(0,$N+1,0));
    $visited[$knightPos[0]][$knightPos[1]] = 1;
    while(!$queue->isEmpty()){
        $t = $queue->dequeue();
        if($t->x == $targetPos[0] && $t->y == $targetPos[1]){
            return $t->dis;
        }
        for($i = 0; $i < 8; $i++){
            $x = $t->x + $dx[$i];
            $y = $t->y + $dy[$i];

            if(!$visited[$x][$y] && isSafe($x,$y,$N)){
                $visited[$x][$y] = 1;
                $queue->enqueue(new cell($x,$y,$t->dis+1));
            }
        }
    }
}

$N = 30;
$knightPos = [ 1, 1 ];
$targetPos = [ 30, 30 ];

// Function call
echo minStepToReachTarget($knightPos, $targetPos, $N);