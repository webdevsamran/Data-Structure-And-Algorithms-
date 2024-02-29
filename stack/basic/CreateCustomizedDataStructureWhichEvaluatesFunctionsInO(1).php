<?php

class Stack
{
    public $min;
    public $max;
    public $size;
    public $arr;

    function __construct()
    {
        $this->min = PHP_INT_MAX;
        $this->size = -1;
        $this->arr = array();
        $this->max = 100;
    }

    public function addElement($element): void
    {
        if ($this->size > $this->max) {
            echo "Stack is Full <br/>\n";
            return;
        }
        if ($element < $this->min) {
            $this->min = $element;
        }
        $element = [$element, $this->min];
        array_push($this->arr, $element);
        $this->size++;
    }

    public function getLastElement(): int
    {
        if ($this->size == -1) {
            echo "No Element is Present <br/>\n";
            return 0;
        }
        return $this->arr[$this->size][0];
    }

    public function getMin(): int
    {
        if ($this->size == -1) {
            echo "No Element is Present <br/>\n";
            return 0;
        }
        return $this->arr[$this->size][1];
    }

    public function removeLastElement(): void
    {
        if ($this->size == -1) {
            echo "No Element is Present <br/>\n";
            return;
        }
        if ($this->size > 0 && $this->arr[$this->size - 1][1] > $this->arr[$this->size][1]) {
            $this->min = $this->arr[$this->size - 1][1];
        }
        array_pop($this->arr);
        $this->size -= 1;
    }
}

$stack = new Stack();
$stack->addElement(1);
$stack->addElement(2);
echo $stack->getMin() . "<br/>\n";
echo $stack->getLastElement() . "<br/>\n";
$stack->removeLastElement();
echo $stack->getMin() . "<br/>\n";
echo $stack->getLastElement() . "<br/>\n";
