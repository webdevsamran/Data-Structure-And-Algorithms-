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
        $this->adj[$v][] = $u;
    }

    private function isCyclicUtil($u,&$visited,$parent){
        $visited[$u] = 1;
        foreach($this->adj[$u] as $v){
            if(!$visited[$v]){
                if($this->isCyclicUtil($v,$visited,$u)){
                    return true;
                }
            }else if($v != $parent){
                return true;
            }
        }
        return false;
    }

    function isCyclic(){
        $visited = array_fill(0,$this->v,0);
        for($u = 0; $u < $this->v; $u++){
            if(!$visited[$u]){
                if($this->isCyclicUtil($u,$visited,-1)){
                    return true;
                }
            }
        }
        return false;
    }
}

$g1 = new Graph(5);
$g1->addEdge(1, 0);
$g1->addEdge(0, 2);
$g1->addEdge(2, 1);
$g1->addEdge(0, 3);
$g1->addEdge(3, 4);
echo $g1->isCyclic() ? "Graph contains cycle<br/>" : "Graph doesn't contain cycle<br/>";

$g2 = new Graph(3);
$g2->addEdge(0, 1);
$g2->addEdge(1, 2);
echo $g2->isCyclic() ? "Graph contains cycle<br/>" : "Graph doesn't contain cycle<br/>";