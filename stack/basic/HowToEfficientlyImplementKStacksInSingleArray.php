<?php

class kStacks
{
    public $arr;
    public $next;
    public $top;
    public $size;
    public $free;

    function __construct($size, $total_stacks)
    {
        $this->arr = new SplFixedArray($size);
        $this->next = new SplFixedArray($size);
        $this->top = new SplFixedArray($total_stacks);
        $this->size = $size;
        $this->free = 0;

        for ($i = 0; $i < $total_stacks; $i++) {
            $this->top[$i] = -1;
        }
        for ($i = 0; $i < $size - 1; $i++) {
            $this->next[$i] = $i + 1;
        }
        $this->next[$size - 1] = -1;
    }

    public function isFull(): bool
    {
        return $this->free == -1;
    }

    public function isEmpty($stackNumber): bool
    {
        return ($this->top[$stackNumber] == -1);
    }

    public function push($x, $stackNumber): void
    {
        if ($this->isFull()) {
            echo "Stack is Full <br/>\n";
            return;
        }
        $i = $this->free;
        $this->free = $this->next[$i];
        $this->next[$i] = $this->top[$stackNumber];
        $this->top[$stackNumber] = $i;
        $this->arr[$i] = $x;
    }

    public function pop($stackNumber): int
    {
        if ($this->isEmpty($stackNumber)) {
            echo "Stack is Empty <br/>\n";
            return -1;
        }
        $i = $this->top[$stackNumber];
        $this->top[$stackNumber] = $this->next[$i];
        $this->next[$i] = $this->free;
        $this->free = $i;
        return $this->arr[$i];
    }
}

$k = 3;
$n = 10;
$ks = new kStacks($n, $k);
$ks->push(15, 2);
$ks->push(45, 2);
$ks->push(17, 1);
$ks->push(49, 1);
$ks->push(39, 1);
$ks->push(11, 0);
$ks->push(9, 0);
$ks->push(7, 0);

echo $ks->pop(2) . "<br/>\n";
echo $ks->pop(1) . "<br/>\n";
echo $ks->pop(0) . "<br/>\n";
