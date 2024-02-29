<?php

class Graph{
    public $v;
    public $list;

    function __construct($v)
    {
        $this->v = $v;
        $this->list = array();
    }

    function addEdge($u,$v){
        $this->list[$u][] = $v;
    }

    private function topologicalSortUtil($i,&$visited,&$stack){
        $visited[$i] = 1;
        foreach($this->list[$i] as $val){
            if(!isset($visited[$val])){
                $this->topologicalSortUtil($val,$visited,$stack);
            }
        }
        $stack->push($i);
    }

    function topologicalSort(){
        $stack = new SplStack;
        $visited = array();
        
        foreach($this->list as $key => $val){
            if(!isset($visited[$key])){
                $this->topologicalSortUtil($key,$visited,$stack);
            }
        }

        while(!$stack->isEmpty()){
            echo chr($stack->pop()) ." ";
        }
    }
}

function printOrder($words,$n,$alpha){
    $graph = new Graph($alpha);
    for($i = 0; $i < $n - 1; $i++){
        $word1 = $words[$i];
        $word2 = $words[$i+1];
        for($j = 0; $j < min(strlen($word1),strlen($word2)); $j++){
            if(ord($word1[$j]) != ord($word2[$j])){
                $graph->addEdge(ord($word1[$j]),ord($word2[$j]));
                break;
            }
        }
    }
    $graph->topologicalSort();
}

$words = ["caa", "aaa", "aab"];
printOrder($words, 3, 3);