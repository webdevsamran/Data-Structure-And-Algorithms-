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
        if(!isset($this->adj[$u])){
            return;
        }
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
                $this->topologicalSortUtil($i, $visited, $stack);
            }
        }
        while(!$stack->isEmpty()){
            $el = $stack->pop();
            echo chr(ord('a') + $el) . " ";
        }
    }
}

function printOrder($words, $n, $alpha){
    $g = new Graph($alpha);
    for($i = 0; $i < $n-1; $i++){
        $word1 = $words[$i];
        $word2 = $words[$i+1];
        for($j = 0; $j < min(strlen($word1),strlen($word2)); $j++){
            if($word1[$j] != $word2[$j]){
                $g->addEdge(ord($word1[$j]) - ord('a'),ord($word2[$j]) - ord('a'));
                break;
            }
        }
    }
    $g->topologicalSort();
}

$words = ["baa","abcd","abca","cab","cad"];
printOrder($words, 5, 6);