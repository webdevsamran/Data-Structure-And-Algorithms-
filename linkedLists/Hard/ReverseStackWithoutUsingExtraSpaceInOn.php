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

    function push($data){
        if($this->top == NULL){
            $this->top = new StackNode($data);
            return;
        }
        $s = new StackNode($data);
        $s->next = $this->top;
        $this->top = $s;
    }

    function pop(){
        $s = $this->top;
        $this->top = $this->top->next;
        return $s;
    }

    function display()
    {
        $s = $this->top;
        while ($s != NULL) {
            echo $s->data . " ";
            $s = $s->next;
        }
        echo "<br/>";
    }

    function reverse()
    {
        $cur = $prev = $this->top;
        $cur = $cur->next;
        $prev->next = NULL;
        while ($cur != NULL) {
            $succ = $cur->next;
            $cur->next = $prev;
            $prev = $cur;
            $cur = $succ;
        }
        $this->top = $prev;
    }
}

$s = new Stack();
$s->push(1);
$s->push(2);
$s->push(3);
$s->push(4);
echo "Original Stack <br/>";
$s->display();
echo "<br/>";

$s->reverse();

echo "Reversed Stack <br/>";
$s->display();