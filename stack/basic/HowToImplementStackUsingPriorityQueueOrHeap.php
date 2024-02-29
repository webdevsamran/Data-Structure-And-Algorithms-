<?php

class Stack
{
    public $cnt;
    public $pq;

    function __construct()
    {
        $this->cnt = 0;
        $this->pq = new SplMaxHeap();
    }

    public function isEmpty(): bool
    {
        return $this->pq->isEmpty();
    }

    public function top(): array
    {
        $top = $this->pq->top();
        return $top;
    }

    public function pop(): void
    {
        if ($this->pq->isEmpty()) {
            echo "Stack is Empty <br/>\n";
            return;
        }
        $this->cnt--;
        $this->pq->extract();
    }

    public function push($x): void
    {
        $this->cnt++;
        $val = [$this->cnt, $x];
        $this->pq->insert($val);
    }
}

$stack = new Stack();
$stack->push(1);
$stack->push(2);
$stack->push(3);
while (!$stack->isEmpty()) {
    print_r($stack->top());
    echo "<br/>\n";
    $stack->pop();
}
