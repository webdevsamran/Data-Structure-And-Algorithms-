<?php

define('R',6);
define('C',5);

function printMaxSubSquare($matrix){
    $max = 0;
    $S = array_fill(0,2,array_fill(0,C,0));

    for($i = 0; $i < R; $i++){
        for($j = 0; $j < C; $j++){
            $entrie = $matrix[$i][$j];
            if($entrie){
                if($j){
                    $entrie = 1 + min($S[1][$j - 1],$S[0][$j - 1], $S[1][$j]);
                }
            }
            $S[0][$j] = $S[1][$j];
            $S[1][$j] = $entrie;
            $max = max($max,$entrie);
        }
    }
    echo "<pre>";
    print_r($S);

    for($i = 0; $i < $max; $i++){
        for($j = 0; $j < $max; $j++){
            echo "1 ";
        }
        echo "<br/>";
    }
}

$M = [ 
    [ 0, 1, 1, 0, 1 ],
    [ 1, 1, 0, 1, 0 ],
    [ 0, 1, 1, 1, 0 ],
    [ 1, 1, 1, 1, 0 ],
    [ 1, 1, 1, 1, 1 ],
    [ 0, 0, 0, 0, 0 ]
];
 
printMaxSubSquare($M);