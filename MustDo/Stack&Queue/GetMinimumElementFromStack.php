<?php

class MyStack{
    public $s1;
    public $minEle;

    function __construct()
    {
        $this->s1 = new SplStack;
        $this->minEle = NULL;
    }

    function push($x){
        if($this->s1->isEmpty()){
            $this->s1->push($x);
            $this->minEle = $x;
            echo "Number Inserted: " . $x . "<br/>";
            return;
        }else if($x < $this->minEle){
            $this->minEle = $x;
            $this->s1->push(2 * $x - $this->minEle);
        }else{
            $this->s1->push($x);
        }
        echo "Number Inserted: " . $x . "<br/>";
        return;
    }

    function pop(){
        if($this->s1->isEmpty()){
            echo "Stack is Empty.<br/>";
            return;
        }
        echo "Top Most Element is: " . $this->s1->top() . ".";
        $t = $this->s1->pop();
        if($t < $this->minEle){
            echo $this->minEle . ".<br/>";
            $this->minEle = 2 * $this->minEle - $t;
        }else{
            echo $t . ".<br/>";
        }
        return;
    }

    function getMin(){
        if($this->s1->isEmpty()){
            echo "Stack is Empty.<br/>";
        }else{
            echo "Minimum Element is: " . $this->minEle . "<br/>";
        }
        return;
    }
}

$s = new MyStack;
$s->push(3);
$s->push(5);
$s->getMin();
$s->push(2);
$s->push(1);
$s->getMin();
$s->pop();
$s->getMin();
$s->pop();