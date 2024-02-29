<?php

class CircularQueue
{
    public $queue_size;
    public $queue;
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

    public function enqueue($x): void
    {
        if ($this->isFull()) {
            echo "Circular Queue is Full <br/>\n";
            return;
        }
        if ($this->front == -1) {
            $this->front = 0;
        }
        $this->rear = ($this->rear + 1) % $this->queue_size;
        $this->queue[$this->rear] = $x;
    }

    public function dequeue(): void
    {
        if ($this->isEmpty()) {
            echo "Circular Queue is Empty <br/>\n";
            return;
        }
        $x = $this->queue[$this->front];
        if ($this->front == $this->rear) {
            $this->front = -1;
            $this->rear = -1;
        } else {
            $this->front = ($this->front + 1) % $this->queue_size;
        }
        echo $x . " is the Element Dequeued <br/>\n";
    }

    public function printCQ(): void
    {
        if ($this->isEmpty()) {
            echo "Circular Queue is Empty <br/>\n";
            return;
        } else {
            echo "Circular Queue Contains: ";
            for ($i = $this->front; $i != $this->rear; $i = ($i + 1) % $this->queue_size) {
                echo $this->queue[$i] . " ";
            }
            echo $this->queue[$this->rear] . ".<br/>\n";
        }
    }
}

$MyCQ = new CircularQueue(3);
$MyCQ->enqueue(3);
$MyCQ->enqueue(4);
$MyCQ->enqueue(5);
$MyCQ->enqueue(9);
$MyCQ->enqueue(2);

$MyCQ->printCQ();

$MyCQ->dequeue();
$MyCQ->printCQ();
