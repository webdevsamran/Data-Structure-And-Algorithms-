<?php

class Graph
{
    public $V;
    public $list;

    function __construct($v)
    {
        $this->V = $v;
        $this->list = array();
    }

    function addEdge($u, $v): void
    {
        $this->list[$u][] = $v;
    }

    function SCCUtil($u, &$disc, &$low, &$stack, &$stackMember): void
    {
        static $time = 0;
        $disc[$u] = $low[$u] = ++$time;
        $stackMember[$u] = true;
        $stack->push($u);
        foreach ($this->list[$u] as $v) {
            if ($disc[$v] == -1) {
                $this->SCCUtil($v, $disc, $low, $stack, $stackMember);
                $low[$u] = min($low[$u], $low[$v]);
            } else if ($stackMember[$v] == true) {
                $low[$u] = min($low[$u], $disc[$v]);
            }
        }
        $w = 0;
        if ($low[$u] == $disc[$u]) {
            while (!$stack->isEmpty()) {
                $w = (int)$stack->pop();
                $stackMember[$w] = false;
                echo $w . " ";
                if ($w == $u) {
                    break;
                }
            }
            echo "<br/>";
        }
    }

    function SCC(): void
    {
        $disc = array_fill(0, $this->V, -1);
        $low = array_fill(0, $this->V, -1);
        $stackMember = array_fill(0, $this->V, 0);
        $stack = new SplStack;

        for ($i = 0; $i < $this->V; $i++) {
            if ($disc[$i] == -1) {
                $this->SCCUtil($i, $disc, $low, $stack, $stackMember);
            }
        }
    }
}

echo "SCCs in first graph are: ";
$graph = new Graph(5);
$graph->addEdge(1, 0);
$graph->addEdge(0, 2);
$graph->addEdge(2, 1);
$graph->addEdge(0, 3);
$graph->addEdge(3, 4);
$graph->SCC();
