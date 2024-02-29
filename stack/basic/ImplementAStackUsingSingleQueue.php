<?php

class Stack
{
    public $queue;

    function __construct()
    {
        $this->queue = new SplQueue;
    }

    public function isEmpty(): bool
    {
        return $this->queue->isEmpty();
    }

    public function top(): int
    {
        return ($this->queue->isEmpty()) ? -1 : $this->queue->top();
    }

    public function pop(): void
    {
        if ($this->queue->isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return;
        }
        echo $this->queue->pop() . " is the Element Popped <br/>\n";
    }

    public function push($val): void
    {
        $size = $this->queue->count();
        $this->queue->push($val);
        for ($i = 0; $i < $size; $i++) {
            $this->queue->push($this->queue->pop());
        }
    }
}

$stack = new Stack;
$stack->push(10);
$stack->push(20);
echo $stack->top() . "<br/>";
$stack->pop();
$stack->push(30);
$stack->pop();
echo $stack->top() . "<br/>";
