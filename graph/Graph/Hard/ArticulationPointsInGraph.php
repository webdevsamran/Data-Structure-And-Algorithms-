<?php

function APUtil($adj,$u,&$visited,&$disc,&$low,&$time,&$parent,&$isAP){
    $children = 0;
    $disc[$u] = $low[$u] = ++$time;
    $visited[$u] = 1;
    foreach($adj[$u] as $v){
        if(!$visited[$v]){
            $children++;
            APUtil($adj,$v,$visited,$disc,$low,$time,$parent,$isAP);
            $low[$u] = min($low[$u],$low[$v]);
            if($parent != -1 && $low[$v] >= $disc[$u]){
                $isAP[$u] = true;
            }
        }else if($parent != $v){
            $low[$u] = min($low[$u],$disc[$v]);
        }
    }
    if($parent == -1 && $children > 1){
        $isAP[$u] = true;
    }
}

function AP($adj,$n){
    $disc = $low = $visited = $isAP = array_fill(0,$n,0);
    $time = 0;
    $parent = -1;
    for($u = 0; $u < $n; $u++){
        if(!$visited[$u]){
            APUtil($adj,$u,$visited,$disc,$low,$time,$parent,$isAP);
        }
    }
    for($u = 0; $u < $n; $u++){
        if($isAP[$u]){
            echo $u . " ";
        }
    }
}

function addEdge(&$adj,$u,$v){
    $adj[$u][] = $v;
    $adj[$v][] = $u;
}

echo "Articulation points in first graph d<br/>";
$V = 5;
$adj1 = array();
addEdge($adj1, 1, 0);
addEdge($adj1, 0, 2);
addEdge($adj1, 2, 1);
addEdge($adj1, 0, 3);
addEdge($adj1, 3, 4);
AP($adj1, $V);

echo "d<br/>Articulation points in second graph d<br/>";
$V = 4;
$adj2 = array();
addEdge($adj2, 0, 1);
addEdge($adj2, 1, 2);
addEdge($adj2, 2, 3);
AP($adj2, $V);

echo "d<br/>Articulation points in third graph d<br/>";
$V = 7;
$adj3 = array();
addEdge($adj3, 0, 1);
addEdge($adj3, 1, 2);
addEdge($adj3, 2, 0);
addEdge($adj3, 1, 3);
addEdge($adj3, 1, 4);
addEdge($adj3, 1, 6);
addEdge($adj3, 3, 5);
addEdge($adj3, 4, 5);
AP($adj3, $V);