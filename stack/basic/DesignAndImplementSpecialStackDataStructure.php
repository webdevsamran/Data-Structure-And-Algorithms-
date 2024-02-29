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

class specialStack extends Stack
{
    public $min_stack = NULL;
    function __construct()
    {
        $this->min_stack = new SplStack();
    }

    public function push($x): void
    {
        if (parent::isFull()) {
            echo "Stack is Full <br/>\n";
            return;
        }
        parent::push($x);
        if (!$this->min_stack->isEmpty()) {
            $y = $this->min_stack->pop();
            $this->min_stack->push($y);
            if ($x < $y) {
                $this->min_stack->push($x);
            } else {
                $this->min_stack->push($y);
            }
        } else {
            $this->min_stack->push($x);
        }
    }

    public function pop(): void
    {
        if (parent::isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return;
        }
        $x = parent::pop();
        $this->min_stack->pop();
        echo $x . " is the Element Popped";
    }

    public function getMin(): void
    {
        if (parent::isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return;
        }
        $x = $this->min_stack->pop();
        echo $x . " is the Min Element <br/>\n";
    }
}

$stack = new specialStack(5);
$stack->push(18);
$stack->push(19);
$stack->push(29);
$stack->push(15);
$stack->push(16);
$stack->getMin();
$stack->print_stack();
