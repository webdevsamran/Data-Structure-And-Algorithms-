<?php

function checkSorted($size, $queue){
    $stack = new SplStack;
    $expected = 1;
    $fnt = NULL;

    while(!$queue->isEmpty()){
        $fnt = $queue->dequeue();
        if($fnt == $expected){
            $expected++;
        }else{
            if($stack->isEmpty()){
                $stack->push($fnt);
            }else if(!$stack->isEmpty() && $stack->top() < $fnt){
                return false;
            }else{
                $stack->push($fnt);
            }
        }

        while(!$stack->isEmpty() && $stack->top() == $expected){
            $stack->pop();
            $expected++;
        }
    }

    if($expected - 1 == $size && $stack->isEmpty()){
        return true;
    }
    return false;
}

$queue = new SplQueue;
$queue->push(5);
$queue->push(1);
$queue->push(2);
$queue->push(3);
$queue->push(4);
 
$size = $queue->count();

echo (checkSorted($size, $queue) ? "Yes" : "No");