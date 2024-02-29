<?php

class Graph{
    public $V;
    public $adj;

    function __construct($V)
    {
        $this->V = $V;
        $this->adj = array();
    }

    function addEdge($v,$w){
        $this->adj[$v][] = $w;
    }

    function isReachable($s,$d){
        if($s == $d){
            return true;
        }

        $visited = array_fill(0,$this->V,0);
        $visited[$s] = 1;
        $queue = new SplQueue();
        $queue->enqueue($s);

        while(!$queue->isEmpty()){
            $s = $queue->dequeue();
            foreach($this->adj[$s] as $var){
                if($var == $d){
                    return true;
                }
                if(!$visited[$var]){
                    $visited[$var] = 1;
                    $queue->enqueue($var);
                }
            }
        }

        return false;
    }
}

$g = new Graph(4);
$g->addEdge(0, 1);
$g->addEdge(0, 2);
$g->addEdge(1, 2);
$g->addEdge(2, 0);
$g->addEdge(2, 3);
$g->addEdge(3, 3);

$u = 1;
$v = 3;
if($g->isReachable($u, $v))
    echo "<br/> There is a path from " . $u . " to " . $v;
else
    echo "<br/> There is no path from " . $u . " to " . $v;

$u = 3;
$v = 1;
if($g->isReachable($u, $v))
    echo "<br/> There is a path from " . $u . " to " . $v;
else
    echo "<br/> There is no path from " . $u . " to " . $v;