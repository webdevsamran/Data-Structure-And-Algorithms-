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

    private function isCyclicUtil($v,&$visited,&$restack){
        if(!$visited[$v]){
            $visited[$v] = $restack[$v] = true;
            foreach($this->adj[$v] as $u){
                if(!$visited[$u] && $this->isCyclicUtil($u,$visited,$restack)){
                    return true;
                }else if($restack[$u]){
                    return true;
                }
            }
        }
        $restack[$v] = false;
        return false;
    }

    function isCyclic(){
        $visited = $restack = array_fill(0,$this->v,0);
        for($i = 0; $i < $this->v; $i++){
            if(!$visited[$i] && $this->isCyclicUtil($i,$visited,$restack)){
                return true;
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
if ($g->isCyclic())
    echo "Graph contains cycle";
else
    echo "Graph doesn't contain cycle";