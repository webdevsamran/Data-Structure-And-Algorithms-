<?php

class Graph{
    public $V;
    public $adj;

    function __construct($v)
    {
        $this->V = $v;
        $this->adj = array();
    }

    function addEdge($u,$v,$w){
        $this->adj[$u][] = [$v,$w];
        $this->adj[$v][] = [$u,$w];
    }

    function pathMoreThanK($src,$k){
        $path = array_fill(0,$this->V,0);
        $path[$src] = 1;
        return $this->pathMoreThanKUtil($src,$k,$path);
    }

    private function pathMoreThanKUtil($src,$k,&$path){
        if($k <= 0){
            return true;
        }
        foreach($this->adj[$src] as $item){
            $v = $item[0];
            $w = $item[1];
            if($path[$v] == 1){
                continue;
            }
            if($w >= $k){
                return true;
            }
            $path[$v] = 1;
            if($this->pathMoreThanKUtil($v,$k-$w,$path)){
                return true;
            }
            $path[$v] = 0;
        }
        return false;
    }
}

$V = 9;
$graph = new Graph($V);

$graph->addEdge(0, 1, 4);
$graph->addEdge(0, 7, 8);
$graph->addEdge(1, 2, 8);
$graph->addEdge(1, 7, 11);
$graph->addEdge(2, 3, 7);
$graph->addEdge(2, 8, 2);
$graph->addEdge(2, 5, 4);
$graph->addEdge(3, 4, 9);
$graph->addEdge(3, 5, 14);
$graph->addEdge(4, 5, 10);
$graph->addEdge(5, 6, 2);
$graph->addEdge(6, 7, 1);
$graph->addEdge(6, 8, 6);
$graph->addEdge(7, 8, 7);

$src = 0;
$k = 62;
echo $graph->pathMoreThanK($src, $k)? "Yes<br/>" : "No<br/>";

$k = 60;
echo $graph->pathMoreThanK($src, $k)? "Yes<br/>" : "No<br/>";