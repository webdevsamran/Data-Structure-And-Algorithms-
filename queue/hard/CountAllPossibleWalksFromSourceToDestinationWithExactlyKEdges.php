<?php

define('V',4);

function countwalks($graph,$u,$v,$k){
    if ($k == 0 && $u == $v)
        return 1;
    if ($k == 1 && $graph[$u][$v])
        return 1;
    if ($k <= 0)
        return 0;
    $count = 0;
    for ($i = 0; $i < V; $i++)
        if ($graph[$u][$i] == 1)
            $count += countwalks($graph, $i, $v, $k - 1);
    return $count;
}

$graph = 
[ 
    [ 0, 1, 1, 1 ],
    [ 0, 0, 0, 1 ],
    [ 0, 0, 0, 1 ],
    [ 0, 0, 0, 0 ]
];

$u = 0;
$v = 3;
$k = 2;
echo countwalks($graph, $u, $v, $k);