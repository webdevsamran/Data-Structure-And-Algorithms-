<?php

define('SIZE',4);

class BFSElement {
    public $i;
    public $j;

    function __construct($i,$j)
    {
        $this->i = $i;
        $this->j = $j;
    }
}

function findPath($m){
    $queue = new SplQueue;
    for($i = 0; $i < SIZE; $i++){
        for($j = 0; $j < SIZE; $j++){
            if($m[$i][$j] == 1){
                $queue->enqueue(new BFSElement($i,$j));
                break;
            }
        }
    }
    while(!$queue->isEmpty()){
        $x = $queue->dequeue();
        $i = $x->i;
        $j = $x->j;
        if($i >= 0 && $j >= 0 && $i < SIZE && $j < SIZE){
            if($m[$i][$j] == 0){
                continue;
            }
            if($m[$i][$j] == 2){
                return true;
            }
            $m[$i][$j] = 0;
            for($k = -1; $k <= 1; $k += 2){
                $queue->enqueue(new BFSElement($i + $k, $j));
                $queue->enqueue(new BFSElement($i, $j + $k));
            }
        }
    }
    return false;
}

$M = [ 
    [ 0, 3, 0, 1 ],
    [ 3, 0, 3, 3 ],
    [ 2, 3, 3, 3 ],
    [ 0, 3, 3, 3 ] 
];
echo (findPath($M) == true) ? "Yes" : "No";