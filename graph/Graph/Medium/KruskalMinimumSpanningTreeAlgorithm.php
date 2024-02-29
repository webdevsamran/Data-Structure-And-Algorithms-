<?php

class DSU{
    public $parent;
    public $rank;

    function __construct($n)
    {
        $this->parent = array_fill(0,$n,-1);
        $this->rank = array_fill(0,$n,1);
    }

    function find($i){
        if($this->parent[$i] == -1){
            return $i;
        }
        return $this->find($this->parent[$i]);
    }

    function unite($x,$y){
        $s1 = $this->find($x);
        $s2 = $this->find($y);

        if($s1 != $s2){
            if($this->rank[$s1] < $this->rank[$s2]){
                $this->parent[$s1] = $s2;
            }else if($this->rank[$s1] > $this->rank[$s2]){
                $this->parent[$s2] = $s1;
            }else{
                $this->parent[$s2] = $s1;
                $this->rank[$s1]++;
            }
        }
    }
}

class Graph{
    public $v;
    public $adj;

    function __construct($v){
        $this->v = $v;
        $this->adj = array();
    }

    function addEdge($u,$v,$w){
        $this->adj[] = [$w,$u,$v];
    }

    function kruskals_mst(){
        sort($this->adj);
        $s = new DSU($this->v);
        $ans = 0;
        echo "Following are the edges in the constructed MST: <br/>";
        foreach($this->adj as $edge){
            $w = $edge[0];
            $u = $edge[1];
            $v = $edge[2];
            if($s->find($u) != $s->find($v)){
                $s->unite($u,$v);
                $ans += $w;
                echo $u . " -- " . $v . " == " . $w . "<br/>";
            }
        }
        echo "Minimum Cost Spanning Tree: " . $ans;
    }
}

$g = new Graph(4);
$g->addEdge(0, 1, 10);
$g->addEdge(1, 3, 15);
$g->addEdge(2, 3, 4);
$g->addEdge(2, 0, 6);
$g->addEdge(0, 3, 5);
$g->kruskals_mst();