<?php

function isSafe($x,$y,$row,$col){
    return ($x >= 0 && $x < $row && $y >= 0 && $y < $col);
}

function BFS($A,$src,$dest, $row, $col){
    if(!$A[$src[0]][$src[1]] || !$A[$dest[0]][$dest[1]]){
        return -1;
    }
    $rowNum = [ -1, 0, 0, 1];
    $colNum = [ 0, -1, 1, 0];
    $visited = array_fill(0,$row,array_fill(0,$col,0));
    $visited[$src[0]][$src[1]] = true;
    $queue = new SplQueue;
    $queue->enqueue([$src,0]);
    while(!$queue->isEmpty()){
        $item= $queue->dequeue();
        $point = $item[0];
        $distance = $item[1];
        if($point[0] == $dest[0] && $point[1] == $dest[1]){
            return $distance;
        }
        for($i = 0; $i < 4; $i++){
            $x = $point[0] + $rowNum[$i];
            $y = $point[1] + $colNum[$i];
            if(isSafe($x,$y,$row,$col) && $A[$x][$y] && !$visited[$x][$y]){
                $visited[$x][$y] = true;
                $queue->enqueue([[$x,$y],$distance+1]);
            }
        }
    }
    return -1;
}

$row = 3;
$col = 4;
$A = [
    [1,0,0,0],
    [1,1,0,1],
    [0,1,1,1]
];
$source = [0, 0];
$dest = [2 ,3];
$dist = BFS($A, $source, $dest, $row, $col);
if ($dist != -1)
    echo "Shortest Path is " . $dist;
else
    echo "Shortest Path doesn't exist";