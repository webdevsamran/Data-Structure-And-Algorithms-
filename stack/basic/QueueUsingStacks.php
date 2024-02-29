<?php

class Queue
{
    public $stack1 = NULL;
    public $stack2 = NULL;

    function __construct()
    {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }

    public function enqueue($x): void
    {
        while (!$this->stack1->isEmpty()) {
            $this->stack2->push($this->stack1->pop());;
        }
        $this->stack1->push($x);
        while (!$this->stack2->isEmpty()) {
            $this->stack1->push($this->stack2->pop());
        }
    }

    public function dequeue(): void
    {
        if ($this->stack1->isEmpty()) {
            echo "Queue is Empty <br/>\n";
            return;
        }
        $x = $this->stack1->pop();
        echo $x . " is the node <br/>\n";
    }
}

$queue = new Queue();
$queue->enqueue(1);
$queue->enqueue(2);
$queue->enqueue(3);

$queue->dequeue();
$queue->dequeue();
$queue->dequeue();
