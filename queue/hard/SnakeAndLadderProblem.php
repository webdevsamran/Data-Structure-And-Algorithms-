<?php

function getMinDiceThrows($moves,$n){
    $visited = array_fill(0,$n,0);
    $visited[0] = 1;
    $queue = new SplQueue;
    $queue->enqueue([0,0]);
    $qe = NULL;
    while(!$queue->isEmpty()){
        $qe = $queue->dequeue();
        $v = $qe[0];
        if($v == $n - 1){
            break;
        }
        for($j = $v + 1; $j < $n && $j <= ($v + 6); $j++){
            if(!$visited[$j]){
                $visited[$j] = 1;
                $a = array();
                if($moves[$j] != -1){
                    $a[0] = $moves[$j];
                }else{
                    $a[0] = $j;
                }
                $a[1] = $qe[1] + 1;
                $queue->enqueue($a);
            }
        }
    }
    return $qe[1];
}

$N = 30;
$moves = array();
for($i = 0; $i < $N; $i++)
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