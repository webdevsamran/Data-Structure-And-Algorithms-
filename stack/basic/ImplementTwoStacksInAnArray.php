<?php

class twoStacks
{
    public $arr;
    public $size;
    public $top1;
    public $top2;

    function __construct($size)
    {
        $this->arr = new SplFixedArray($size);
        $this->size = $size;
        $this->top1 = (int)($size / 2);
        $this->top2 = (int)($size / 2);
    }

    public function push1($x): void
    {
        if ($this->top1 > 0) {
            $this->top1--;
            $this->arr[$this->top1] = $x;
            return;
        } else {
            echo "Stack 1 is Full <br/>\n";
            return;
        }
    }

    public function push2($x): void
    {
        if ($this->top2 < $this->size - 1) {
            $this->top2++;
            $this->arr[$this->top2] = $x;
            return;
        } else {
            echo "Stack 2 is Full <br/>\n";
            return;
        }
    }

    public function pop1(): void
    {
        if ($this->top1 <= (int)($this->size / 2)) {
            $x = $this->arr[$this->top1];
            $this->top1++;
            echo $x . " is the Element Popped";
        } else {
            echo "Stack 1 is Empty <br/>\n";
            return;
        }
    }

    public function pop2(): void
    {
        if ($this->top2 >= (int)($this->size / 2)) {
            $x = $this->arr[$this->top2];
            $this->top1--;
            echo $x . " is the Element Popped";
        } else {
            echo "Stack 2 is Empty <br/>\n";
            return;
        }
    }
}

$ts = new twoStacks(5);
$ts->push1(5);
$ts->push2(10);
$ts->push2(15);
$ts->push1(11);
$ts->push2(7);
$ts->pop1();
$ts->push2(40);
$ts->pop2();
