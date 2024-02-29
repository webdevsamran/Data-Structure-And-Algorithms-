<?php

class Stack{
    public $q1;
    public $q2;

    function __construct()
    {
        $this->q1 = new SplQueue;
        $this->q2 = new SplQueue;
    }

    function push($x){
        $this->q2->enqueue($x);
        while(!$this->q1->isEmpty()){
            $this->q2->enqueue($this->q1->dequeue());
        }
        $q = $this->q1;
        $this->q1 = $this->q2;
        $this->q2 = $q;
    }

    function pop(){
        if($this->q1->isEmpty()){
            return -1;
        }
        return $this->q1->dequeue();
    }
}

$s = new Stack;
$s->push(1);
$s->push(2);
$s->push(3);

echo $s->pop() ."<br/>";
echo $s->pop() ."<br/>";