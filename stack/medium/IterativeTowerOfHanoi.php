<?php

$rod = ['S','A','D'];
$stack = array(0,3,new SplStack);

function moveDisk($from,$to){
    global $stack;
    global $rod;
    if($stack[$to]->isEmpty() || (!$stack[$from]->isEmpty() && $stack[$from]->top() < $stack[$to]->top())){
        echo "Move disk " . $stack[$from]->top() . " from rod " . $rod[$from] . " to rod " . $rod[$to] . "<br/>";
        $stack[$to]->push($stack[$from]->top());
        $stack[$from]->pop();
    }else{
        moveDisk($to,$from);
    }
}

function towerOfHanoi($n){
    global $stack;
    echo "Tower Of Hanoi For ". $n . " Disks.<br/>";
    $src = 0;
    $aux = 1;
    $dest = 2;
    for($i = $n; $i > 0; $i--){
        $stack[$src]->push($i);
    }
    $total_moves = (1 << $n) - 1;
    // if($n % 2 == 0){
    //     swap($aux,$dest);
    // }
    for($i = 1; $i <= $total_moves; $i++){
        if($i % 3 == 0){
            moveDisk($aux,$dest);
        }else if($i % 3 == 1){
            moveDisk($src,$dest);
        }else if($i % 3 == 2){
            moveDisk($src,$aux);
        }
    }
}

$n = 3;
towerOfHanoi($n);