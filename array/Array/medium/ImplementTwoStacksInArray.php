<?php

class TwoStacks{
    public $arr;
    public $size;
    public $top1;
    public $top2;

    function __construct($size)
    {
        $this->arr = array();
        $this->size = $size;
        $this->top1 = (int)($size/2)+1;
        $this->top2 = (int)($size/2);
    }

    function push1($x){
        if($this->top1 > 0){
            $this->top1--;
            $this->arr[$this->top1] = $x;
        }else{
            echo "Stack Overflow.<br/>";
            return;
        }
    }

    function push2($x){
        if($this->top2 < $this->size - 1){
            $this->top2++;
            $this->arr[$this->top2] = $x;
        }else{
            echo "Stack Overflow.<br/>";
            return;
        }
    }

    function pop1(){
        if($this->top1 <= (int)($this->size/2)){
            $x = $this->arr[$this->top1];
            $this->top1++;
            return $x;
        }else{
            echo "Stack Underflow.<br/>";
            return;
        }
    }

    function pop2(){
        if($this->top2 >= (int)($this->size/2) + 1){
            $x = $this->arr[$this->top2];
            $this->top2--;
            return $x;
        }else{
            echo "Stack Underflow.<br/>";
            return;
        }
    }
}

$ts = new TwoStacks(5);
$ts->push1(5);
$ts->push2(10);
$ts->push2(15);
$ts->push1(11);
$ts->push2(7);
echo "Popped element from stack1 is : " . $ts->pop1() . "<br/>";
$ts->push2(40);
echo "Popped element from stack2 is : " . $ts->pop2() . "<br/>";