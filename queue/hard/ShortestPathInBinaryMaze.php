<?php

define('ROW',9);
define('COL',10);

$rowNum = [-1, 0, 0, 1];
$colNum = [0, -1, 1, 0];

function isValid($row, $col)
{
    return ($row >= 0) && ($row < ROW) && ($col >= 0) && ($col < COL);
}

function BFS($mat,$source,$dest){
    global $rowNum;
    global $colNum;
    if(!$mat[$source[0]][$source[1]] || !$mat[$dest[0]][$dest[1]]){
        return -1;
    }
    $visited = array_fill(0,ROW,array_fill(0,COL,0));
    $visited[$source[0]][$source[1]] = 1;
    $queue = new SplQueue;
    $queue->enqueue([$source,0]);

    while(!$queue->isEmpty()){
        $item = $queue->dequeue();
        $src = $item[0];
        $dist = $item[1];

        if($src[0] == $dest[0] && $src[1] == $dest[1]){
            return $dist;
        }

        for($i = 0; $i < 4; $i++){
            $row = $src[0] + $rowNum[$i];
            $col = $src[1] + $colNum[$i];
            if (isValid($row, $col) && $mat[$row][$col] && !$visited[$row][$col])
            {
                $visited[$row][$col] = 1;
                $Adjcell = [ [$row, $col], $dist + 1 ];
                $queue->enqueue($Adjcell);
            }
        }
    }

    return -1;
}

$mat = [
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
 
$source = [0, 0];
$dest = [3, 4];

$dist = BFS($mat, $source, $dest);

if ($dist != -1)
    echo "Shortest Path is " . $dist ;
else
    echo "Shortest Path doesn't exist";