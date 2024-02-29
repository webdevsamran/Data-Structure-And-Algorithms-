<?php

function checkMirrorTree($n,$e,$A,$B){
    $s = array();
    $q = array();

    for($i = 0; $i < $n; $i++){
        $s[$i] = new SplStack;
        $q[$i] = new SplQueue;
    }

    for($i = 0; $i < 2 * $e; $i+=2){
        $s[$A[$i]]->push($A[$i+1]);
        $q[$B[$i]]->enqueue($B[$i+1]);
    }

    for($i = 1; $i < $n; $i++){
        while(!$s[$i]->isEmpty() && !$q[$i]->isEmpty()){
            $a = $s[$i]->pop();
            $b = $q[$i]->dequeue();
            if($a != $b){
                return false;
            }
        }
    }

    return true;
}

$n = 3;
$e = 2;
$A = [1, 2, 1, 3];
$B = [1, 3, 1, 2];

echo (checkMirrorTree($n, $e, $A, $B) == 1) ? "Yes" : "No";