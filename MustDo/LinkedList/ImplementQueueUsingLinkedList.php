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

class Queue{
    public $front;
    public $rear;

    function __construct()
    {
        $this->front = $this->rear = NULL;
    }

    function enQueue($x){
        $temp = new Node($x);
        if($this->rear == NULL){
            $this->front = $this->rear = $temp;
            return;
        }
        $this->rear->next = $temp;
        $this->rear = $temp;
    }

    function deQueue(){
        if($this->front == NULL){
            return;
        }
        $temp = $this->front;
        $this->front = $this->front->next;
        if($this->front == NULL){
            $this->rear = NULL;
        }
        echo $temp->data . " ";
        $temp = NULL;
        return;
    }
}

$queue = new Queue();
$queue->enQueue(2);
$queue->enQueue(3);
$queue->deQueue();
$queue->enQueue(4);
$queue->deQueue();