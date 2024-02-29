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

    function bridgeUtil($u,&$visited,&$disc,&$low,$parent){
        static $time = 0;
        $visited[$u] = 1;
        $disc[$u] = $low[$u] = ++$time;
        foreach($this->adj[$u] as $val){
            $v = $val;
            if($v == $parent){
                continue;
            }
            if($visited[$v]){
                $low[$u] = min($low[$u],$disc[$v]);
            }else{
                $parent = $u;
                $this->bridgeUtil($v,$visited,$disc,$low,$parent);
                $low[$u] = min($low[$u],$low[$v]);
                if($low[$v] > $disc[$u]){
                    echo $u . " " . $v . "<br/>";
                }
            }
        }
    }

    function bridge(){
        $visited = array_fill(0,$this->v,0);
        $disc = $low = array_fill(0,$this->v,-1);
        $parent = -1;
        for($i = 0; $i < $this->v; $i++){
            if(!$visited[$i]){
                $this->bridgeUtil($i,$visited,$disc,$low,$parent);
            }
        }
    }
}

echo "<br/>Bridges in first graph <br/>";
$g1 = new Graph(5);
$g1->addEdge(1, 0);
$g1->addEdge(0, 2);
$g1->addEdge(2, 1);
$g1->addEdge(0, 3);
$g1->addEdge(3, 4);
$g1->bridge();

echo "<br/>Bridges in second graph<br/>n";
$g2 = new Graph(4);
$g2->addEdge(0, 1);
$g2->addEdge(1, 2);
$g2->addEdge(2, 3);
$g2->bridge();

echo "<br/>Bridges in third graph <br/>";
$g3 = new Graph(7);
$g3->addEdge(0, 1);
$g3->addEdge(1, 2);
$g3->addEdge(2, 0);
$g3->addEdge(1, 3);
$g3->addEdge(1, 4);
$g3->addEdge(1, 6);
$g3->addEdge(3, 5);
$g3->addEdge(4, 5);
$g3->bridge();