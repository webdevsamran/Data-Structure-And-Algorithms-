<?php

function printQueue($queue)
{
    $queue->rewind();
    while ($queue->valid()) {
        echo $queue->current() . " ";
        $queue->next();
    }
}

function reverseQueue(&$queue): SplQueue
{
    $stack = new SplStack;
    while (!$queue->isEmpty()) {
        $stack->push($queue->dequeue());
    }
    while (!$stack->isEmpty()) {
        $queue->push($stack->pop());
    }
    return $queue;
}

$queue = new SplQueue;
$queue->push(10);
$queue->push(20);
$queue->push(30);
$queue->push(40);
$queue->push(50);
$queue->push(60);
$queue->push(70);
$queue->push(80);
$queue->push(90);
$queue->push(100);
printQueue($queue);
echo "<br/>\n";
$queue = reverseQueue($queue);
printQueue($queue);
