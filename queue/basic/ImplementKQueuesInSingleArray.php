<?php

class KQueues
{
    public $arr;
    public $next;
    public $front;
    public $rear;
    public $free;
    public $n;
    public $k;

    function __construct($n, $k)
    {
        $this->n = $n;
        $this->k = $k;
        $this->arr = new SplFixedArray($n);
        $this->next = new SplFixedArray($n);
        $this->front = new SplFixedArray($k);
        $this->rear = new SplFixedArray($k);

        for ($i = 0; $i < $k; $i++) {
            $this->front[$i] = -1;
        }
        $this->free = 0;
        for ($i = 0; $i < $n - 1; $i++) {
            $this->next[$i] = $i + 1;
        }
        $this->next[$n - 1] = -1;
    }

    public function isFull(): bool
    {
        return $this->free == -1;
    }

    public function isEmpty($qn): bool
    {
        return ($this->front[$qn] == -1);
    }

    public function enqueue($item, $qn): void
    {
        if ($this->isFull()) {
            echo "All Queues are Completely Full. <br/>\n";
            return;
        }
        $i = $this->free;
        $this->free = $this->next[$i];
        if ($this->isEmpty($qn)) {
            $this->front[$qn] = $i;
        } else {
            $this->next[$this->rear[$qn]] = $i;
        }
        $this->next[$i] = -1;
        $this->rear[$qn] = $i;
        $this->arr[$i] = $item;
    }

    public function dequeue($qn): void
    {
        if ($this->isEmpty($qn)) {
            echo "All Queues are Completely Empty. <br/>\n";
            return;
        }
        $i = $this->front[$qn];
        $this->front[$qn] = $this->next[$i];
        $this->next[$i] = $this->free;
        $this->free = $i;
        echo $this->arr[$i] . " is the Element Popped. <br/>\n";
    }
}

$kQueues = new KQueues(10, 3);
$kQueues->enqueue(15, 2);
$kQueues->enqueue(45, 2);
$kQueues->enqueue(17, 1);
$kQueues->enqueue(49, 1);
$kQueues->enqueue(39, 1);
$kQueues->enqueue(11, 0);
$kQueues->enqueue(9, 0);
$kQueues->enqueue(7, 0);
$kQueues->dequeue(2);
$kQueues->dequeue(1);
$kQueues->dequeue(0);
