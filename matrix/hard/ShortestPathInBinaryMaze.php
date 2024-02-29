<?php

define('ROW',9);
define('COL',10);

$rowNum = [-1, 0, 0, 1];
$colNum = [0, -1, 1, 0];

class Point{
    public $x;
    public $y;

    function __construct($x = NULL,$y = NULL)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

function isValid($row, $col)
{
    return ($row >= 0) && ($row < ROW) && ($col >= 0) && ($col < COL);
}

function BFS($mat,$src,$dest){
    global $rowNum;
    global $colNum;
    if(!$mat[$src->x][$src->y] || !$mat[$dest->x][$dest->y]){
        return -1;
    }
    $visited = array_fill(0,ROW,array_fill(0,COL,0));
    $visited[$src->x][$src->y] = 1;
    $q = new SplQueue;
    $q->enqueue([$src,0]);

    while(!$q->isEmpty()){
        $curr = $q->dequeue();
        print_r($curr);
        echo "<br/>";
        $pt = $curr[0];
        $dist = $curr[1];

        if($pt->x == $dest->x && $pt->y == $dest->y){
            return $dist;
        }

        for($i = 0; $i < 4; $i++){
            $row = $pt->x + $rowNum[$i];
            $col = $pt->y + $colNum[$i];

            if(isValid($row,$col) && $mat[$row][$col] && !$visited[$row][$col]){
                $visited[$row][$col] = 1;
                $pt = new Point($row,$col);
                $q->enqueue([$pt,$dist + 1]);
            }
        }
    }

    return -1;
}

$mat =
[
    [ 1, 0, 1, 1, 1, 1, 0, 1, 1, 1 ],
    [ 1, 0, 1, 0, 1, 1, 1, 0, 1, 1 ],
    [ 1, 1, 1, 0, 1, 1, 0, 1, 0, 1 ],
    [ 0, 0, 0, 0, 1, 0, 0, 0, 0, 1 ],
    [ 1, 1, 1, 0, 1, 1, 1, 0, 1, 0 ],
    [ 1, 0, 1, 1, 1, 1, 0, 1, 0, 0 ],
    [ 1, 0, 0, 0, 0, 0, 0, 0, 0, 1 ],
    [ 1, 0, 1, 1, 1, 1, 0, 1, 1, 1 ],
    [ 1, 1, 0, 0, 0, 0, 1, 0, 0, 1 ]
];

$source = new Point(0, 0);
$dest = new Point(2, 5);

$dist = BFS($mat, $source, $dest);

if ($dist != -1)
    echo "Shortest Path is ". $dist;
else
    echo "Shortest Path doesn't exist";