<?php

class Queue{
    private $s1;
    private $s2;

    function __construct()
    {
        $this->s1 = new SplStack;
        $this->s2 = new SplStack;
    }

    function enQueue($x){
        while(!$this->s1->isEmpty()){
            $this->s2->push($this->s1->top());
            $this->s1->pop();
        }
        $this->s1->push($x);
        while(!$this->s2->isEmpty()){
            $this->s1->push($this->s2->top());
            $this->s2->pop();
        }
        return;
    }

    function deQueue(){
        if($this->s1->isEmpty()){
            echo "Queue is Empty.<br/>";
            return -1;
        }
        $x = $this->s1->pop();
        return $x;
    }
}

$q = new Queue;
$q->enQueue(1);
$q->enQueue(2);
$q->enQueue(3);

echo $q->deQueue() . "<br/>";
echo $q->deQueue() . "<br/>";
echo $q->deQueue() . "<br/>";