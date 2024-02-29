<?php

class Graph{
    public $v;
    public $adj;

    function __construct($v)
    {
        $this->v = $v;
        $this->adj = array();
    }

    function addEdge($u,$v){
        $this->adj[$u][] = $v;
    }

    private function topologicalSortUtil($u,&$visited,&$stack){
        $visited[$u] = true;
        foreach($this->adj[$u] as $v){
            if(!$visited[$v]){
                $this->topologicalSortUtil($v,$visited,$stack);
            }
        }
        $stack->push($u);
    }

    function topologicalSort(){
        $visited = array_fill(0,$this->v,0);
        $stack = new SplStack;
        for($i = 0; $i < $this->v; $i++){
            if(!$visited[$i]){
                $this->topologicalSortUtil($i,$visited,$stack);
            }
        }
        while(!$stack->isEmpty()){
            echo $stack->pop() . " ";
        }
        unset($visited);
    }
}

$g = new Graph(6);
$g->addEdge(5, 2);
$g->addEdge(5, 0);
$g->addEdge(4, 0);
$g->addEdge(4, 1);
$g->addEdge(2, 3);
$g->addEdge(3, 1);
echo "Following is a Topological Sort of the given graph: ";
$g->topologicalSort();