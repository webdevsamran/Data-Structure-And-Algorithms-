<?php

define('SIZE',4);

class QItem{
    public $row;
    public $col;
    public $dist;

    function __construct($x,$y,$w)
    {
        $this->row = $x;
        $this->col = $y;
        $this->dist = $w;
    }
}

function minDistance($grid){
    $source = new QItem(0,0,0);
    $visited = array();
    for($i = 0; $i < SIZE; $i++){
        for($j = 0; $j < SIZE; $j++){
            if($grid[$i][$j] == '0'){
                $visited[$i][$j] = 1;
            }else{
                $visited[$i][$j] = 0;
            }
            if($grid[$i][$j] == 's'){
                $source->row = $i;
                $source->col = $j;
            }
        }
    }
    $queue = new SplQueue;
    $queue->enqueue($source);
    $visited[$source->row][$source->col] = 1;
    while(!$queue->isEmpty()){
        $item = $queue->dequeue();
        if($grid[$item->row][$item->col] == 'd'){
            return $item->dist;
        }
        if ($item->row - 1 >= 0 && $visited[$item->row - 1][$item->col] == false) {
            $queue->enqueue(new QItem($item->row - 1, $item->col, $item->dist + 1));
            $visited[$item->row - 1][$item->col] = true;
        }
        if ($item->row + 1 < SIZE && $visited[$item->row + 1][$item->col] == false) {
            $queue->enqueue(new QItem($item->row + 1, $item->col, $item->dist + 1));
            $visited[$item->row + 1][$item->col] = true;
        }
        if ($item->col - 1 >= 0 && $visited[$item->row][$item->col - 1] == false) {
            $queue->enqueue(new QItem($item->row, $item->col - 1, $item->dist + 1));
            $visited[$item->row][$item->col - 1] = true;
        }
        if ($item->col + 1 < SIZE && $visited[$item->row][$item->col + 1] == false) {
            $queue->enqueue(new QItem($item->row, $item->col + 1, $item->dist + 1));
            $visited[$item->row][$item->col + 1] = true;
        }
    }
    return -1;
}

$grid = [ 
    [ '0', '*', '0', 's' ],
    [ '*', '0', '*', '*' ],
    [ '0', '*', '*', '*' ],
    [ 'd', '*', '*', '*' ]
];

echo minDistance($grid);