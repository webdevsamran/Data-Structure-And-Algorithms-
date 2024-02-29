<?php

define('n',2);
define('m',5);

function maxStop($arr){
    $vect = array();
    for($i = 0; $i < m; $i++){
        if(!array_key_exists($arr[$i][2],$vect)){
            $vect[$arr[$i][2]][] = [$arr[$i][1],$arr[$i][0]];
            continue;
        }
        $vect[$arr[$i][2]][] = [$arr[$i][1],$arr[$i][0]];
    }
    for($i = 1; $i <= n; $i++){
        sort($vect[$i]);
    }
    $count = 0;
    for($i = 1; $i <= n; $i++){
        if(sizeof($vect[$i]) == 0){
            continue;
        }
        $x = 0;
        $count++;
        for($j = 1; $j < sizeof($vect[$i]); $j++){
            if($vect[$i][$j][1] >= $vect[$i][$x][0]){
                $x = $j;
                $count++;
            }
        }
    }
    return $count;
}

$arr = [ 
    [1000, 1030, 1],
    [1010, 1020, 1],
    [1025, 1040, 1],
    [1130, 1145, 2],
    [1130, 1140, 2] 
];
echo "Maximum Stopped Trains = " . maxStop($arr);