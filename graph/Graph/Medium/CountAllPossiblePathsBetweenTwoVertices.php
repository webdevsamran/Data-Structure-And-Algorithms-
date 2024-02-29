<?php

class Graph{
    public $v;
    public $adj;

    function __construct($v)
    {
        $this->v = $v;
        $this->adj = array();
    }

    function addEdge($u, $v){
        $this->adj[$u][] = $v;
    }

    private function path_counter($src,$dest,&$path_count,&$visited){
        $visited[$src] = true;
        if($src == $dest){
            $path_count++;
        }else{
            foreach($this->adj[$src] as $v){
                if(!$visited[$v]){
                    $this->path_counter($v,$dest,$path_count,$visited);
                }
            }
        }
        $visited[$src] = false;
    }

    function count_paths($src,$dest,$vertices){
        $path_count = 0;
        $visited = array_fill(0,$vertices,0);
        $this->path_counter($src,$dest,$path_count,$visited);
        return $path_count;
    }
}

$g = new Graph(5);
$g->addEdge(0, 1);
$g->addEdge(0, 2);
$g->addEdge(0, 4);
$g->addEdge(1, 3);
$g->addEdge(1, 4);
$g->addEdge(2, 3);
$g->addEdge(2, 1);
$g->addEdge(3, 2);
echo $g->count_paths(0, 4, 5);