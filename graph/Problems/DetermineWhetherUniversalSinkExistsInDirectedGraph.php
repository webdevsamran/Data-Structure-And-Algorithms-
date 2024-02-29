<?php

class Graph{
    public $vertices;
    public $adj;

    function __construct($n)
    {
        $this->vertices = $n;
        $this->adj = array();
    }

    function insert($source,$destination){
        $this->adj[$destination-1][] = 1;
    }

    function is_sink($i){
        for($j = 0; $j < $this->vertices; $j++){
            if($this->adj[$i][$j] == 1){
                return false;
            }
            if($this->adj[$j][$i] == 0 && $i != $j){
                return false;
            }
        }
        return true;
    }

    function eliminate(){
        $i = 0;
        $j = 0;
        while($i < $this->vertices && $j < $this->vertices){
            if($this->adj[$i][$j] == 1){
                $i = $i + 1;
            }else{
                $j = $j + 1;
            }
        }
        if($i > $this->vertices){
            return -1;
        }else if(!$this->is_sink($i)){
            return -1;
        }else{
            return $i;
        }
    }
}

$number_of_vertices = 6;
$number_of_edges = 5;
$graph = new Graph($number_of_vertices);
$graph->insert(1, 6);
$graph->insert(2, 3);
$graph->insert(2, 4);
$graph->insert(4, 3);
$graph->insert(5, 3);

$vertex = $graph->eliminate();

echo ($vertex >= 0) ? "Sink found at vertex " . ($vertex + 1) . "<br/>": "No Sink" . "<br/>";