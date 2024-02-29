<?php

function spirallyTraverse($matrix,$row,$col){
    $r = $c = 0;
    $er = $row - 1;
    $ec = $col - 1;
    $ans = array();
    while($r < $er && $c < $ec){
        for($i = $c; $i <= $ec; $i++){
            array_push($ans, $matrix[$r][$i]);
        }
        $r++;
        for($i = $r; $i <= $er; $i++){
            array_push($ans, $matrix[$i][$ec]);
        }
        $ec--;
        if($c <= $ec){
            for($i = $ec; $i >= $c; $i--){
                array_push($ans, $matrix[$er][$i]);
            }
            $er--;
        }
        if($r <= $er){
            for($i = $er; $i >= $r; $i--){
                array_push($ans, $matrix[$i][$c]);
            }
            $c++;
        }
    }
    return $ans;
}

$r = 4;
$c = 4;
$matrix = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12],
    [13, 14, 15,16]
];

print_r(spirallyTraverse($matrix,$r,$c));