<?php

class myStack
{
    public $stack;
    public $minEle;

    function __construct()
    {
        $this->stack = new SplStack;
    }

    public function getMin(): void
    {
        if ($this->stack->isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return;
        }
        echo $this->minEle . " is the Minimum Element <br/>\n";
        return;
    }

    public function peek(): void
    {
        if ($this->stack->isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return;
        }
        $t = $this->stack->top();
        echo ($t > $this->minEle) ? $t : $this->minEle;
        return;
    }

    public function push($x): void
    {
        if ($this->stack->isEmpty()) {
            $this->minEle = $x;
            $this->stack->push($x);
            return;
        } else if ($this->minEle > $x) {
            $this->stack->push((2 * $x - $this->minEle));
            $this->minEle = $x;
            return;
        } else {
            $this->stack->push($x);
        }
    }

    public function pop(): int
    {
        if ($this->stack->isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return -1;
        }
        $t = $this->stack->pop();
        if ($t > $this->minEle) {
            return $t;
        } else {
            $number = $this->minEle;
            $this->minEle = 2 * $this->minEle - $t;
            return $number;
        }
    }
}

$stack = new MyStack;
$stack->push(3);
$stack->push(5);
$stack->getMin();
$stack->push(2);
$stack->push(1);
$stack->getMin();
echo $stack->pop() . "<br/>";
$stack->getMin();
echo $stack->pop() . "<br/>";
$stack->peek();
