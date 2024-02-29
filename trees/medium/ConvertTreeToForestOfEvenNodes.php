<?php

function dfs($tree,&$visited,&$ans,$node){
    $num = 0;
    $temp = 0;
    $visited[$node] = 1;
    for($i = 0; $i < sizeof($tree[$node]); $i++){
        if($visited[$tree[$node][$i]] == 0){
            $temp = dfs($tree,$visited,$ans,$tree[$node][$i]);
            ($temp%2) ? $num += $temp : ($ans++);
        }
    }
    return $num+1;
}

function minEdge($tree,$size){
    $visited = array_fill(0,$size+2,0);
    $ans = 0;
    dfs($tree,$visited,$ans,1);
    return $ans;
}

$n = 10;
 
$tree = array();
$tree[1][] = (3);
$tree[3][] = (1);

$tree[1][] = (6);
$tree[6][] = (1);

$tree[1][] = (2);
$tree[2][] = (1);

$tree[3][] = (4);
$tree[4][] = (3);

$tree[6][] = (8);
$tree[8][] = (6);

$tree[2][] = (7);
$tree[7][] = (2);

$tree[2][] = (5);
$tree[5][] = (2);

$tree[4][] = (9);
$tree[9][] = (4);

$tree[4][] = (10);
$tree[10][] = (4);

echo minEdge($tree, $n) . "<br/>";