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

    private function DFSUtil($u,&$visited){
        $visited[$u] = true;
        foreach($this->adj[$u] as $v){
            if(!$visited[$v]){
                $this->DFSUtil($v,$visited);
            }
        }
    }

    function findMother(){
        $visited = array_fill(0,$this->v,0);
        $v = 0;
        for($i = 0; $i < $this->v; $i++){
            if(!$visited[$i]){
                $this->DFSUtil($i,$visited);
                $v = $i;
            }
        }
        $visited = array_fill(0,$this->v,0);
        $this->DFSUtil($v,$visited);
        for($i = 0; $i < $this->v; $i++){
            if(!$visited[$i]){
                return -1;
            }
        }
        return $v;
    }
}

$g = new Graph(7);
$g->addEdge(0, 1);
$g->addEdge(0, 2);
$g->addEdge(1, 3);
$g->addEdge(4, 1);
$g->addEdge(6, 4);
$g->addEdge(5, 6);
$g->addEdge(5, 2);
$g->addEdge(6, 0);
echo "A mother vertex is " . $g->findMother();