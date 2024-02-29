<?php

function reverseFirstK(&$queue,$k){
    if($queue->isEmpty() || $k > $queue->count()){
        return;
    }
    if($k <= 0){
        return;
    }
    $stack = new SplStack;
    for($i = 0; $i < $k; $i++){
        $stack->push($queue->dequeue());
    }
    while(!$stack->isEmpty()){
        $queue->enqueue($stack->pop());
    }
    echo "<pre>";
    print_r($queue);
    for($i = 0; $i < $queue->count() - $k; $i++){
        $queue->enqueue($queue->dequeue());
    }
}

function PrintQ($queue){
    while (!$queue->isEmpty()) {
        echo $queue->dequeue() . " ";
    }
}

$queue = new SplQueue;
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);
$queue->enqueue(40);
$queue->enqueue(50);
$queue->enqueue(60);
$queue->enqueue(70);
$queue->enqueue(80);
$queue->enqueue(90);
$queue->enqueue(100);

$k = 5;

reverseFirstK($queue, $k);

PrintQ($queue);