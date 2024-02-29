<?php

class Dequeue
{
    public $queue;
    public $queue_size;
    public $front;
    public $rear;

    function __construct($size)
    {
        $this->front = -1;
        $this->rear = -1;
        $this->queue_size = $size;
        $this->queue = new SplFixedArray($size);
    }

    public function isEmpty(): bool
    {
        return ($this->front == -1) ? true : false;
    }

    public function isFull(): bool
    {
        if ($this->front == 0 && $this->rear == $this->queue_size - 1) {
            return true;
        }
        if ($this->front == $this->rear + 1) {
            return true;
        }
        return false;
    }

    public function insertFront($x): void
    {
        if ($this->isFull()) {
            echo "Dequeue is Full. <br/>\n";
            return;
        }
        if ($this->front == -1) {
            $this->front = 0;
            $this->rear = 0;
        } else if ($this->front == 0) {
            $this->front = $this->queue_size - 1;
        } else {
            $this->front = $this->front - 1;
        }
        $this->queue[$this->front] = $x;
    }

    public function insertRear($x): void
    {
        if ($this->isFull()) {
            echo "Dequeue is Full. <br/>\n";
            return;
        }
        if ($this->front == -1) {
            $this->front = 0;
            $this->rear = 0;
        } else if ($this->rear == $this->queue_size - 1) {
            $this->rear = 0;
        } else {
            $this->rear = $this->rear + 1;
        }
        $this->queue[$this->rear] = $x;
    }

    public function deleteFront(): void
    {
        if ($this->isEmpty()) {
            echo "Dequeue is Empty. <br/>\n";
            return;
        }
        if ($this->front == $this->rear) {
            $this->front = -1;
            $this->rear = -1;
        } else if ($this->front == $this->queue_size - 1) {
            $this->front = 0;
        } else {
            $this->front = $this->front + 1;
        }
    }

    public function deleteRear(): void
    {
        if ($this->isEmpty()) {
            echo "Dequeue is Empty. <br/>\n";
            return;
        }
        if ($this->front == $this->rear) {
            $this->front = -1;
            $this->rear = -1;
        } else if ($this->rear == 0) {
            $this->rear = $this->queue_size - 1;
        } else {
            $this->rear = $this->rear - 1;
        }
    }

    public function getFront(): void
    {
        if ($this->isEmpty()) {
            echo "Dequeue is Empty. <br/>\n";
            return;
        }
        echo $this->queue[$this->front] . " is the Front Element. <br/>\n";
    }

    public function getRear(): void
    {
        if ($this->isEmpty()) {
            echo "Dequeue is Empty. <br/>\n";
            return;
        }
        echo $this->queue[$this->rear] . " is the Rear Element. <br/>\n";
    }
}

$MyDequeue = new Dequeue(4);
$MyDequeue->insertRear(10);
$MyDequeue->insertRear(20);
$MyDequeue->getRear();
$MyDequeue->deleteRear();
$MyDequeue->getRear();
$MyDequeue->insertFront(40);
$MyDequeue->getFront();
$MyDequeue->deleteFront();
$MyDequeue->getFront();
