<?php

class Stack
{
    public $top;
    public $stack;
    public $stack_size;

    function __construct($size)
    {
        $this->top = -1;
        $this->stack_size = $size;
        $this->stack = new SplFixedArray($size);
    }

    public function isEmpty(): bool
    {
        if ($this->top == -1) {
            return true;
        }
        return false;
    }

    public function isFull(): bool
    {
        if ($this->top == $this->stack_size - 1) {
            return true;
        }
        return false;
    }

    public function push($x): void
    {
        if ($this->isFull()) {
            echo "Stack is Full <br/>\n";
            return;
        }
        $this->stack[++$this->top] = $x;
    }

    public function pop(): void
    {
        if ($this->isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return;
        }
        $x = $this->stack[$this->top--];
        echo $x . " is the element popped <br/>\n";
    }

    public function print_stack(): void
    {
        if ($this->isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return;
        }
        echo "Element in Stack are: ";
        for ($i = 0; $i <= $this->top; $i++) {
            echo $this->stack[$i] . " ";
        }
        echo "<br/>\n";
    }
}

$stack = new Stack(3);
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);
$stack->print_stack();
$stack->pop();
$stack->print_stack();
