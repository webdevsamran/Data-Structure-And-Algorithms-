<?php

define('row',5);
define('col',4);

function count_live_neighbour_cell($arr,$r,$c){
    $count = 0;
    for($i = $r-1; $i <= $r+1; $i++){
        for($j = $c-1; $j <= $c+1; $j++){
            if(($i == $r && $j == $c) || ($i < 0 || $j < 0) || ($i >= row || $j >= col)){
                continue;
            }
            if($arr[$i][$j] == 1){
                $count++;
            }
        }
    }
    return $count;
}

$a = array();
$b = array();
$neighbour_live_cell = NULL;

for($i = 0; $i < row; $i++){
    for($j = 0; $j < col; $j++){
        $a[$i][$j] = rand(0,1);
    }
}

echo "Initial Stage: <br/>";
for($i = 0; $i < row; $i++){
    for($j = 0; $j < col; $j++){
        echo $a[$i][$j]." ";
    }
    echo "<br/>";
}

for($i = 0; $i < row; $i++){
    for($j = 0; $j < col; $j++){
        $neighbour_live_cell = count_live_neighbour_cell($a,$i,$j);
        if($a[$i][$j] == 1 && ($neighbour_live_cell == 2 || $neighbour_live_cell == 3)){
            $b[$i][$j] = 1;
        }else if($a[$i][$j] == 0 && $neighbour_live_cell == 3){
            $b[$i][$j] = 1;
        }else{
            $b[$i][$j] = 0;
        }
    }
}

echo "Final Stage: <br/>";
for($i = 0; $i < row; $i++){
    for($j = 0; $j < col; $j++){
        echo $b[$i][$j]." ";
    }
    echo "<br/>";
}