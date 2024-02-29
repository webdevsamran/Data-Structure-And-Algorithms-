<?php

class Node{
    public $data;
    public $next;
}

class MyStack{
    public $head;
    public $tail;

    function __construct()
    {
        $this->head = NULL;
        $this->tail = NULL;
    }
}

function create(){
    return new MyStack();
}

function push($data,&$stack){
    $temp = new Node();
    $temp->data = $data;
    $temp->next = $stack->head;

    if($stack->head == NULL){
        $stack->tail = $temp;
    }

    $stack->head = $temp;
}

function pop(&$stack){
    if($stack->head == NULL){
        echo "Stack Underflow. <br/>";
        return;
    }
    $temp = $stack->head;
    $stack->head = $stack->head->next;
    $popped = $temp->data;
    $temp = NULL;
    return $popped;
}

function merge(&$stack1,&$stack2){
    if($stack1->head == NULL){
        $stack1->head = $stack2->head;
        $stack1->tail = $stack2->tail;
        return;
    }
    $stack1->tail->next = $stack2->head;
    $stack1->tail = $stack2->tail;
}

function display($stack){
    $temp = $stack->head;
    while($temp != NULL){
        echo $temp->data." ";
        $temp = $temp->next;
    }
    echo "<br/>";
}

$ms1 = create();
$ms2 = create();

push(6, $ms1);
push(5, $ms1);
push(4, $ms1);
push(9, $ms2);
push(8, $ms2);
push(7, $ms2);
merge($ms1, $ms2);
display($ms1);