<?php

function travllingSalesmanProblem($graph){
    $sum = 0;
    $counter = 0;
    $min = PHP_INT_MAX;
    $visitedRouteList = array();
    $visitedRouteList[0] = 1;
    $route = array();
    $i = 0;
    $j = 0;

    while($i < sizeof($graph) && $j < sizeof($graph[$i])){
        if($counter >= sizeof($graph[$i]) - 1){
            break;
        }
        if($i != $j && !isset($visitedRouteList[$j])){
            if($graph[$i][$j] < $min){
                $min = $graph[$i][$j];
                $route[$counter] = $j + 1;
            }
        }
        $j++;
        if($j == sizeof($graph[$i])){
            $sum += $min;
            $min = PHP_INT_MAX;
            $visitedRouteList[$route[$counter] - 1] = 1;
            $j = 0;
            $i = $route[$counter] - 1;
            $counter++;
        }
    }

    $i = $route[$counter] - 1;
    for($j = 0; $j < sizeof($graph); $j++){
        if($i != $j && $graph[$i][$j] < $min){
            $min = $graph[$i][$j];
            $route[$counter] = $j + 1;
        }
    }
    $sum += $min;
    echo "Min Cost is: ". $sum;
}

$graph = [ 
    [ -1, 10, 15, 20 ],
    [ 10, -1, 35, 25 ],
    [ 15, 35, -1, 30 ],
    [ 20, 25, 30, -1 ] 
];

$s = 0;
echo travllingSalesmanProblem($graph) . "<br/>";