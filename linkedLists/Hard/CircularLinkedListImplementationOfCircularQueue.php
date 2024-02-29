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
}

function enqueue(&$q,$val){
    $temp = new Node($val);
    if($q->front == NULL){
        $q->front = $temp;
    }else{
        $q->rear->next = $temp;
    }
    $q->rear = $temp;
    $q->rear->next = $q->front;
}

function dequeue(&$q){
    if($q->front == NULL){
        echo "Circular Queue is Empty<br/>";
        return;
    }
    $value = NULL;
    if($q->front ==  $q->rear){
        $value = $q->front->data;
        $q->front = NULL;
        $q->rear = NULL;
    }else{
        $temp = $q->front;
        $value = $temp->data;
        $q->front = $q->front->next;
        $q->rear->next = $q->front;
        $temp = NULL;
    }
    return $value;
}

function displayQueue($q){
    $temp = $q->front;
    echo "<br/>Elements in Circular Queue are: <br/>";
    while ($temp->next != $q->front) {
        echo $temp->data . " ";
        $temp = $temp->next;
    }
    echo $temp->data;
}

$q = new Queue;
$q->front = $q->rear = NULL;

// Inserting elements in Circular Queue
enQueue($q, 14);
enQueue($q, 22);
enQueue($q, 6);

// Display elements present in Circular Queue
displayQueue($q);

// Deleting elements from Circular Queue
echo "<br/>Deleted value = " . deQueue($q);
echo "<br/>Deleted value = " . deQueue($q);

// Remaining elements in Circular Queue
displayQueue($q);

enQueue($q, 9);
enQueue($q, 20);
displayQueue($q);