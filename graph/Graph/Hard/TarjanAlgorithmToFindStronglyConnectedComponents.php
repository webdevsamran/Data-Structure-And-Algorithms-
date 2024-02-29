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

    function SCCUtil($u,&$disc,&$low,&$st,&$stackMember){
        static $time = 0;
        $disc[$u] = $low[$u] = ++$time;
        $st->push($u);
        $stackMember[$u] = 1;
        if(!isset($this->adj[$u])){
            return;
        }
        foreach($this->adj[$u] as $val){
            $v = $val;
            if($disc[$v] == -1){
                $this->SCCUtil($v,$disc,$low,$st,$stackMember);
                $low[$u] = min($low[$u],$low[$v]);
            }else if($stackMember[$v]){
                $low[$u] = min($low[$u],$disc[$v]);
            }
        }
        $w = 0;
        if($low[$u] == $disc[$u]){
            while($st->top() != $u){
                $w = $st->pop();
                echo $w . " ";
                $stackMember[$w] = 0;
            }
            $w = $st->pop();
            echo $w . " ";
            $stackMember[$w] = 0;
        }
    }

    function SCC(){
        $disc = $low = array_fill(0,$this->v,-1);
        $stackMember = array_fill(0,$this->v,0);
        $st = new SplStack;
        for($i = 0; $i < $this->v; $i++){
            $this->SCCUtil($i,$disc,$low,$st,$stackMember);
        }
    }
}

echo "<br/>SCCs in first graph <br/>";
$g1 = new Graph(5);
$g1->addEdge(1, 0);
$g1->addEdge(0, 2);
$g1->addEdge(2, 1);
$g1->addEdge(0, 3);
$g1->addEdge(3, 4);
$g1->SCC();

echo "<br/>SCCs in second graph <br/>";
$g2 = new Graph(4);
$g2->addEdge(0, 1);
$g2->addEdge(1, 2);
$g2->addEdge(2, 3);
$g2->SCC();

echo "<br/>SCCs in third graph <br/>";
$g3 = new Graph(7);
$g3->addEdge(0, 1);
$g3->addEdge(1, 2);
$g3->addEdge(2, 0);
$g3->addEdge(1, 3);
$g3->addEdge(1, 4);
$g3->addEdge(1, 6);
$g3->addEdge(3, 5);
$g3->addEdge(4, 5);
$g3->SCC();

echo "<br/>SCCs in fourth graph <br/>";
$g4 = new Graph(11);
$g4->addEdge(0, 1);
$g4->addEdge(0, 3);
$g4->addEdge(1, 2);
$g4->addEdge(1, 4);
$g4->addEdge(2, 0);
$g4->addEdge(2, 6);
$g4->addEdge(3, 2);
$g4->addEdge(4, 5);
$g4->addEdge(4, 6);
$g4->addEdge(5, 6);
$g4->addEdge(5, 7);
$g4->addEdge(5, 8);
$g4->addEdge(5, 9);
$g4->addEdge(6, 4);
$g4->addEdge(7, 9);
$g4->addEdge(8, 9);
$g4->addEdge(9, 8);
$g4->SCC();

echo "<br/>SCCs in fifth graph \<br/>";
$g5 = new Graph(5);
$g5->addEdge(0, 1);
$g5->addEdge(1, 2);
$g5->addEdge(2, 3);
$g5->addEdge(2, 4);
$g5->addEdge(3, 0);
$g5->addEdge(4, 2);
$g5->SCC();