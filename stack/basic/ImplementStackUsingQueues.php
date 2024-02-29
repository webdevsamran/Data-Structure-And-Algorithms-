<?php

class Stack
{
    public $que1 = NULL;
    public $que2 = NULL;

    function __construct()
    {
        $this->que1 = new SplQueue;
        $this->que2 = new SplQueue;
    }

    public function push($x): void
    {
        $this->que2->enqueue($x);
        while (!$this->que1->isEmpty()) {
            $this->que2->enqueue($this->que1->dequeue());
        }
        $temp = $this->que1;
        $this->que1 = $this->que2;
        $this->que2 = $temp;
    }

    public function pop(): void
    {
        if (!$this->que1->isEmpty()) {
            $x = $this->que1->pop();
            echo $x . " is the Element <br/>\n";
            return;
        }
        echo "Stack is Empty <br/>\n";
        return;
    }

    public function top(): void
    {
        if (!$this->que1->isEmpty()) {
            $x = $this->que1->top();
            echo $x . " is the Top Element <br/>\n";
            return;
        }
        echo "Stack is Empty <br/>\n";
        return;
    }

    public function size(): void
    {
        if (!$this->que1->isEmpty()) {
            $x = $this->que1->count();
            echo $x . " is the size of Stack <br/>\n";
            return;
        }
        echo "Stack is Empty <br/>\n";
        return;
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
