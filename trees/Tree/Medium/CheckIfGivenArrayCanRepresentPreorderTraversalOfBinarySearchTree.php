<?php

function canRepresentBST($pre,$n){
    $stack = new SplStack;
    $root = PHP_INT_MIN;
    for($i = 0; $i < $n; $i++){
        if($pre[$i] < $root){
            return false;
        }
        while(!$stack->isEmpty() && $stack->top() < $pre[$i]){
            $root = $stack->pop();
        }
        $stack->push($pre[$i]);
    }
    return true;
}

$pre1 = [40, 30, 35, 80, 100];
$n = sizeof($pre1);
echo canRepresentBST($pre1, $n) ? "true" : "false";
echo "<br/>";
$pre2 = [40, 30, 35, 20, 80, 100];
$n = sizeof($pre2);
echo canRepresentBST($pre2, $n) ? "true" : "false";