<?php

class queueEntry {
    public $v;
    public $dist;

    function __construct($v,$dist)
    {
        $this->v = $v;
        $this->dist = $dist;
    }
}

function getMinDiceThrows($moves,$n){
    $visited = array_fill(0,$n,0);
    $visited[0] = true;
    $queue = new SplQueue;
    $queue->enqueue(new queueEntry(0,0));
    $qe = NULL;
    while(!$queue->isEmpty()){
        $qe = $queue->dequeue();
        $v = $qe->v;
        if($v == $n-1){
            break;
        }
        for($j = $v + 1; $j < $n && $j <= ($v + 6); $j++){
            if(!$visited[$j]){
                $visited[$j] = true;
                $dist = $qe->dist + 1;
                if($moves[$j] != -1){
                    $v = $moves[$j];
                }else{
                    $v = $j;
                }
                $queue->enqueue(new queueEntry($v,$dist));
            }
        }
    }
    return $qe->dist;
}

$N = 30;
$moves = array();
for ($i = 0; $i < $N; $i++)
    $moves[$i] = -1;

$moves[2] = 21;
$moves[4] = 7;
$moves[10] = 25;
$moves[19] = 28;

$moves[26] = 0;
$moves[20] = 8;
$moves[16] = 3;
$moves[18] = 6;

echo "Min Dice throws required is " . getMinDiceThrows($moves, $N);