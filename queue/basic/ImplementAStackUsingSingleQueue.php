<?php

class Stack
{
    public $queue;

    function __construct()
    {
        $this->queue = new SplQueue;
    }

    public function push($x): void
    {
        $size = $this->queue->count();
        $this->queue->push($x);
        for ($i = 0; $i < $size; $i++) {
            $this->queue->push($this->queue->dequeue());
        }
    }

    public function pop(): void
    {
        if ($this->queue->isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return;
        }
        echo $this->queue->dequeue() . " is the Element Popped <br/>\n";
    }

    public function top(): void
    {
        if ($this->queue->isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return;
        }
        echo $this->queue->top() . " is the Top Element <br/>\n";
    }

    public function empty(): bool
    {
        return ($this->queue->isEmpty());
    }
}


$stack = new Stack;
$stack->push(10);
$stack->push(20);
echo $stack->top();
$stack->pop();
$stack->push(30);
$stack->pop();
echo $stack->top();
