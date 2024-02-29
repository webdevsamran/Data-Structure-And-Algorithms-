<?php

class Graph{
    public $V;
    public $neighbours;

    function __construct($v)
    {
        $this->V = $v;
        $this->neighbours = array();
    }

    function add_edge($src,$dest){
        $this->neighbours[$src][] = $dest;
    }

    function count_paths($src,$dest,$vertices){
        $path_count = 0;
        $visited = array_fill(0,$this->V,0);
        $this->path_counter($src,$dest,$path_count,$visited);
        return $path_count;
    }

    private function path_counter($src,$dest,&$path_count,&$visited){
        $visited[$src] = 1;
        if($src == $dest){
            $path_count++;
        }else{
            foreach($this->neighbours[$src] as $neighbour){
                if(!$visited[$neighbour]){
                    $this->path_counter($neighbour,$dest,$path_count,$visited);
                }
            }
        }
        $visited[$src] = 0;
    }
}

$graph = new Graph(5);
$graph->add_edge(0, 1);
$graph->add_edge(0, 2);
$graph->add_edge(0, 4);
$graph->add_edge(1, 3);
$graph->add_edge(1, 4);
$graph->add_edge(2, 3);
$graph->add_edge(2, 1);
$graph->add_edge(3, 2);
    
echo $graph->count_paths(0, 4, 5);