<?php

class Node
{
    public $data;
    public $next;
    public $prev;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
        $this->prev = NULL;
    }
}

class Deque
{
    public $front;
    public $rear;
    public $size;

    function __construct()
    {
        $this->size = 0;
        $this->front = NULL;
        $this->rear = NULL;
    }

    public function isEmpty(): bool
    {
        return ($this->front == NULL);
    }

    public function size(): int
    {
        return $this->size;
    }

    public function insertFront($data): void
    {
        $node = new Node($data);
        if ($this->front == NULL) {
            $this->front = $node;
            $this->rear = $node;
        } else {
            $node->next = $this->front;
            $this->front->prev = $node;
            $this->front = $node;
        }
        $this->size++;
    }

    public function insertRear($data): void
    {
        $node = new Node($data);
        if ($this->rear == NULL) {
            $this->front = $node;
            $this->rear = $node;
        } else {
            $node->prev = $this->rear;
            $this->rear->next = $node;
            $this->rear = $node;
        }
        $this->size++;
    }

    public function deleteFront(): void
    {
        if ($this->isEmpty()) {
            echo "Dequeue is Empty <br/>\n";
            return;
        } else {
            $temp = $this->front;
            $this->front = $this->front->next;
            if ($this->front == NULL) {
                $this->rear = NULL;
            } else {
                $this->front->prev = NULL;
            }
            $temp = NULL;
            $this->size--;
        }
    }

    public function deleteRear(): void
    {
        if ($this->isEmpty()) {
            echo "Dequeue is Empty <br/>\n";
            return;
        } else {
            $temp = $this->rear;
            $this->rear = $this->rear->prev;
            if ($this->rear == NULL) {
                $this->front = NULL;
            } else {
                $this->rear->next = NULL;
            }
            $temp = NULL;
            $this->size--;
        }
    }

    public function getFront(): int
    {
        if ($this->isEmpty()) {
            echo "Dequeue is Empty <br/>\n";
            return NULL;
        }
        return $this->front->data;
    }

    public function getRear(): int
    {
        if ($this->isEmpty()) {
            echo "Dequeue is Empty <br/>\n";
            return NULL;
        }
        return $this->rear->data;
    }

    public function erase(): void
    {
        $this->rear = NULL;
        while ($this->front != NULL) {
            $temp = $this->front;
            $this->front = $this->front->next;
            $temp = NULL;
        }
        $this->size = 0;
    }
}

$dq = new Deque;
echo "Insert element '5' at rear end <br/>\n";
$dq->insertRear(5);
echo "Insert element '10' at rear end <br/>\n";
$dq->insertRear(10);
echo "Rear end element: " . $dq->getRear() . "<br/>\n";
$dq->deleteRear();
echo "After deleting rear element new rear is: " . $dq->getRear() . "<br/>\n";
echo "Inserting element '15' at front end <br/>\n";
$dq->insertFront(15);
echo "Front end element: " . $dq->getFront() . "<br/>\n";
echo "Number of elements in Deque: " . $dq->size() . "<br/>\n";;
$dq->deleteFront();
echo "After deleting front element new front is: " . $dq->getFront() . "<br/>\n";
