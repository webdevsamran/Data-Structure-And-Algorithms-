<?php

class Node{
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

    function push($x){
        $temp = new Node($x);
        $temp->next = $this->top;
        $this->top = $temp;
    }

    function pop(){
        if($this->top == NULL){
            echo "Stack is Empty.<br/>";
            return;
        }
        $temp = $this->top;
        $this->top = $this->top->next;
        echo $temp->data . " ";
        $temp = NULL;
        return;
    }
}

$stack = new Stack;
$stack->push(2);
$stack->push(3);
$stack->pop();
$stack->push(4);
$stack->pop();