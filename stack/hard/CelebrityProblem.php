<?php

define('N',8);
$MATRIX = [ 
    [ 0, 0, 1, 0 ],
    [ 0, 0, 1, 0 ],
    [ 0, 0, 0, 0 ],
    [ 0, 0, 1, 0 ]
];

function knows($a,$b){
    global $MATRIX;
    return $MATRIX[$a][$b];
}

function findCelebrity($n){
    $stack = new SplStack;
    for($i = 0; $i < $n; $i++){
        $stack->push($i);
    }
    $C = NULL;
    while($stack->count() > 1){
        $A = $stack->pop();
        $B = $stack->pop();
        if(knows($A,$B)){
            $stack->push($B);
        }else{
            $stack->push($A);
        }
    }
    $C = $stack->pop();
    for($i = 0; $i < $C; $i++){
        if(($i != $C) && (knows($C,$i) || !knows($i,$C))){
            return -1;
        }
    }
    return $C;
}

$n = 4;
$id = findCelebrity($n);
echo $id == -1 ? "No celebrity" : "Celebrity ID " . $id;