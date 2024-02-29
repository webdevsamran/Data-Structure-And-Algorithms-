<?php

class Stack
{
    public $queue1;
    public $queue2;

    function __construct()
    {
        $this->queue1 = new SplQueue;
        $this->queue2 = new SplQueue;
    }

    public function push($x): void
    {
        while (!$this->queue1->isEmpty()) {
            $this->queue2->enqueue($this->queue1->dequeue());
        }
        $this->queue2->enqueue($x);
        $temp = $this->queue1;
        $this->queue1 = $this->queue2;
        $this->queue2 = $temp;
    }

    public function pop(): void
    {
        if ($this->queue1->isEmpty()) {
            return;
        }
        echo $this->queue1->pop() . " is the Element Popped. <br/>\n";
    }

    public function top(): void
    {
        if ($this->queue1->isEmpty()) {
            return;
        }
        echo $this->queue1->top() . " is the Top Element. <br/>\n";
    }

    public function size(): void
    {
        echo $this->queue1->count() . " is the size of Stack. <br/>\n";
    }
}
$stack = new Stack;
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->size();
$stack->top();
$stack->pop();
$stack->top();
$stack->pop();
$stack->top();
$stack->size();
