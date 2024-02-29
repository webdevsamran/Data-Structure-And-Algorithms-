<?php

class cell{
    public $x;
    public $y;
    public $dist;

    function __construct($x,$y,$dist)
    {
        $this->x = $x;
        $this->y = $y;
        $this->dist = $dist;
    }
}

function isSafe($i,$j){
    global $N;
    return ($i >= 1 && $j >= 1 && $i <= $N && $j <= $N);
}

function minStepToReachTarget($k,$target,$n){
    $dx = [ -2, -1, 1, 2, -2, -1, 1, 2 ];
    $dy = [ -1, -2, -2, -1, 1, 2, 2, 1 ];
    $queue = new SplQueue;
    $queue->enqueue(new cell($k[0],$k[1],0));
    $visit = array_fill(0,$n+1,array_fill(0,$n+1,0));
    $visit[$k[0]][$k[1]] = true;
    while(!$queue->isEmpty()){
        $t = $queue->dequeue();
        if($t->x == $target[0] && $t->y == $target[1]){
            return $t->dist;
        }
        for($i = 0; $i < 8; $i++){
            $x = $t->x + $dx[$i];
            $y = $t->y + $dy[$i];
            if(isSafe($x,$y) && !$visit[$x][$y]){
                $visit[$x][$y] = true;
                $queue->enqueue(new cell($x,$y,$t->dist+1));
            }
        }
    }
}

$N = 30;
$knightPos = [ 1, 1 ];
$targetPos = [ 30, 30 ];
echo minStepToReachTarget($knightPos, $targetPos, $N);