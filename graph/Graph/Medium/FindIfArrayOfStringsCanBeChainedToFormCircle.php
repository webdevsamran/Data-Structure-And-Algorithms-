<?php

define('CHARS',26);

class Graph{
    public $v;
    public $adj;
    public $in;

    function __construct($v)
    {
        $this->v = $v;
        $this->adj = array();
        $this->in = array_fill(0,$v,0);
    }

    function addEdge($u,$v){
        $this->adj[$u][] = $v;
        $this->in[$v]++;
    }

    function __destruct()
    {
        unset($this->adj);
        unset($this->in);
    }

    private function DFSUtil($v,&$visited){
        $visited[$v] = 1;
        if(!isset($this->adj[$v])){
            return;
        }
        foreach($this->adj[$v] as $u){
            if(!isset($this->adj[$u])){
                continue;
            }
            if(!$visited[$u]){
                $this->DFSUtil($u,$visited);
            }
        }
    }

    private function getTranspose(){
        $graph = new Graph($this->v);
        for($v = 0; $v < $this->v; $v++){
            if(!isset($this->adj[$v])){
                continue;
            }
            foreach($this->adj[$v] as $u){
                $graph->adj[$u][] = $v;
                $graph->in[$v]++;
            }
        }
        return $graph;
    }

    private function isSC(){
        $visited = array_fill(0,$this->v,0);
        for($n = 0; $n < $this->v; $n++){
            if(!isset($this->adj[$n])){
                continue;
            }
            if(sizeof($this->adj[$n]) > 0){
                break;
            }
        }
        $this->DFSUtil($n,$visited);
        for($i = 0; $i < $this->v; $i++){
            if(!isset($this->adj[$i])){
                continue;
            }
            if(sizeof($this->adj[$i]) > 0 && !$visited[$i]){
                return false;
            }
        }
        $gr = $this->getTranspose();
        $visited = array_fill(0,$this->v,0);
        $gr->DFSUtil($n,$visited);
        for($i = 0; $i < $this->v; $i++){
            if(!isset($this->adj[$i])){
                continue;
            }
            if(sizeof($this->adj[$i]) > 0 && !$visited[$i]){
                return false;
            }
        }
        return true;
    }

    function isEulerianCycle(){
        if($this->isSC() == false){
            return false;
        }
        for($i = 0; $i < $this->v; $i++){
            if(!isset($this->adj[$i])){
                continue;
            }
            if(sizeof($this->adj[$i]) != $this->in[$i]){
                return false;
            }
        }
        return true;
    }
}

function canBeChained($arr,$n){
    $g = new Graph(CHARS);
    for($i = 0; $i < $n; $i++){
        $s = $arr[$i];
        $g->addEdge((ord($s[0]) - ord('a')),(ord($s[strlen($s)-1]) - ord('a')));
    }
    return $g->isEulerianCycle();
}

$arr1 =  ["for", "geek", "rig", "kaf"];
$n1 = sizeof($arr1);
echo canBeChained($arr1, $n1) ? "Can be chained <br/>": "Can't be chained <br/>";

$arr2 =  ["aab", "abb"];
$n2 = sizeof($arr2);
echo canBeChained($arr2, $n2) ? "Can be chained <br/>": "Can't be chained <br/>";