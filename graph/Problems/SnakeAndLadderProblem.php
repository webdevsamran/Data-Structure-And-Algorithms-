<?php

class queueEntry{
    public $v;
    public $dist;

    function __construct($v = NULL,$dist = NULL)
    {
        $this->v = $v;
        $this->dist = $dist;
    }
}

function getMinDiceThrows($moves,$N){
    $visited = array_fill(0,$N,0);
    $visited[0] = 1;
    $s = new queueEntry(0,0);
    $queue = new SplQueue;
    $queue->enqueue($s);
    $qe = NULL;

    while(!$queue->isEmpty()){
        $qe = $queue->dequeue();
        $v = $qe->v;
        if($v == $N-1){
            break;
        }
        for($j = $v+1; $j <= ($v+6) && $j < $N; $j++){
            if(!$visited[$j]){
                $visited[$j] = true;
                $a = new queueEntry;
                $a->dist = ($qe->dist + 1);
                if($moves[$j] != -1){
                    $a->v = $moves[$j];
                }else{
                    $a->v = $j;
                }
                $queue->enqueue($a);
            }
        }
    }
    return $qe->dist;
}

$N = 30;
$moves = array_fill(0,$N,-1);

// Ladders
$moves[2] = 21;
$moves[4] = 7;
$moves[10] = 25;
$moves[19] = 28;

// Snakes
$moves[26] = 0;
$moves[20] = 8;
$moves[16] = 3;
$moves[18] = 6;

echo "Min Dice throws required is " . getMinDiceThrows($moves, $N);