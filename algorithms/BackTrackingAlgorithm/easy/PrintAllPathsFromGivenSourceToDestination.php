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

    function printAllPaths($src,$dest){
        $visited = array_fill(0,$this->v,0);
        $path = array();
        $path_index = 0;
        $this->printAllPathsUtil($src,$dest,$visited,$path,$path_index);
    }

    private function printAllPathsUtil($src,$dest,&$visited,&$path,&$path_index){
        $visited[$src] = 1;
        $path[$path_index] = $src;
        $path_index++;

        if($src == $dest){
            for ($i = 0; $i < $path_index; $i++)
                echo $path[$i] . " ";
            echo "<br/>";
        }else{
            foreach($this->adj[$src] as $v){
                if(!$visited[$v]){
                    $this->printAllPathsUtil($v,$dest,$visited,$path,$path_index);
                }
            }
        }
        $path_index--;
        $visited[$src] = 0;
    }
}

$graph = new Graph(4);
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(0, 3);
$graph->addEdge(2, 0);
$graph->addEdge(2, 1);
$graph->addEdge(1, 3);

$s = 2;
$d = 3;
echo "Following are all different paths from " . $s . " to " . $d . "<br/>";
$graph->printAllPaths($s, $d);