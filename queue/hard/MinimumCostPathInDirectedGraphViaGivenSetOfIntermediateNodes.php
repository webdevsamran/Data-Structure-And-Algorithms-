<?php

$minSum = PHP_INT_MAX;

function getMinPathSum($graph,&$visited,$necessary,$source,$dest,$currSum){
    global $minSum;
    if($source == $dest){
        $flag = true;
        foreach($necessary as $item){
            if(!$visited[$item]){
                $flag = false;
                break;
            }
        }
        if($flag){
            $minSum = min($minSum,$currSum);
        }
        return;
    }else{
        $visited[$source] = 1;
        foreach($graph[$source] as $node){
            if(!$visited[$node[0]]){
                $visited[$node[0]] = 1;
                getMinPathSum($graph,$visited,$necessary,$node[0],$dest,$currSum + $node[1]);
                $visited[$node[0]] = 0;
            }
        }
        $visited[$source] = 0;
    }
}

$graph = array();
$graph[0] = [ [ 1, 2 ], [ 2, 3 ], [ 3, 2 ] ];
$graph[1] = [ [ 4, 4 ], [ 0, 1 ] ];
$graph[2] = [ [ 4, 5 ], [ 5, 6 ] ];
$graph[3] = [ [ 5, 7 ], [ 0, 1 ] ];
$graph[4] = [ [ 6, 4 ] ];
$graph[5] = [ [ 6, 2 ] ];
$graph[6] = [ [ 7, 11 ] ];
$n = 7;
$source = 0;
$dest = 6;
$visited = array_fill(0, $n, 0);
$necessary = [2, 4];
getMinPathSum($graph, $visited, $necessary, $source, $dest, 0);
if ($minSum == PHP_INT_MAX)
    echo "-1";
else
    echo $minSum;