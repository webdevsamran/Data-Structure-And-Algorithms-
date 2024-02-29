<?php

class PriorityQueue
{
    public $queue = NULL;

    function __construct()
    {
        $this->queue = array();
    }

    public function swap(&$a, &$b): void
    {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }

    public function heapify($i): void
    {
        $largest = $i;
        $left = 2 * $i + 1;
        $right = 2 * $i + 2;
        $size = sizeof($this->queue);
        if ($left < $size && $this->queue[$left] > $this->queue[$largest]) {
            $largest = $left;
        }
        if ($right < $size && $this->queue[$right] > $this->queue[$largest]) {
            $largest = $right;
        }
        if ($largest != $i) {
            $this->swap($this->queue[$largest], $this->queue[$i]);
            $this->heapify($largest);
        }
    }

    public function insert($x): void
    {
        $size = sizeof($this->queue);
        if ($size == 0) {
            array_push($this->queue, $x);
        } else {
            array_push($this->queue, $x);
            for ($i = ($size / 2) - 1; $i >= 0; $i--) {
                $this->heapify($i);
            }
        }
    }

    public function delete($x): void
    {
        $size = sizeof($this->queue);
        if ($size == 0) {
            echo "PQ is Empty. <br/>\n";
            return;
        } else {
            for ($i = 0; $i < $size; $i++) {
                if ($this->queue[$i] == $x) {
                    break;
                }
            }
        }
        $this->swap($this->queue[$i], $this->queue[$size - 1]);
        array_pop($this->queue);
        for ($i = ($size / 2) - 1; $i >= 0; $i--) {
            $this->heapify($i);
        }
    }

    public function printPQ(): void
    {
        $size = sizeof($this->queue);
        if ($size == 0) {
            echo "PQ is Empty. <br/>\n";
            return;
        } else {
            echo "PQ Contains: ";
            for ($i = 0; $i < $size; $i++) {
                echo $this->queue[$i] . " ";
            }
            echo "<br/>\n";
        }
    }
}

$PQ = new PriorityQueue();
$PQ->insert(3);
$PQ->insert(4);
$PQ->insert(5);
$PQ->insert(9);
$PQ->insert(2);

$PQ->printPQ();

$PQ->delete(5);
$PQ->printPQ();
