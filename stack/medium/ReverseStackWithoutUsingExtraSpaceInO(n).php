<?php

class StackNode{
    public $data;
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
}

class Stack{
    public $top;

    function __construct()
    {
        $this->top = NULL;
    }

    public function push($data){
        if($this->top == NULL){
            $this->top = new StackNode($data);
            return;
        }
        $s = new StackNode($data);
        $s->next = $this->top;
        $this->top = $s;
    }

    public function pop(){
        $s = $this->top;
        $this->top = $this->top->next;
        return $s;
    }

    public function display(){
        $s = $this->top;
        while($s != NULL){
            echo $s->data." ";
            $s = $s->next;
        }
        echo "<br/>";
    }

    public function reverse(){
        $prev = $next = NULL;
        $curr = $this->top;
        while($curr != NULL){
            $next = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $next;
        }
        $this->top = $prev;
    }
}

$s = new Stack();
$s->push(1);
$s->push(2);
$s->push(3);
$s->push(4);
echo "Original Stack" . "<br/>";
$s->display();
echo "<br/>";
    
// reverse
$s->reverse();

echo "Reversed Stack" . "<br/>";
$s->display();