<?php

define('SIZE',6);

function bmp($g,$u,&$seen,&$matchR){
    for($v = 0; $v < SIZE; $v++){
        if($g[$u][$v] && !$seen[$v]){
            $seen[$v] = true;
            if($matchR[$v] < 0 || bmp($g,$matchR[$v],$seen,$matchR)){
                $matchR[$v] = $u;
                return true;
            }
        }
    }
    return false;
}

function maxBPM($g){
    $matchR = array_fill(0,SIZE,-1);
    $result = 0;
    for($u = 0; $u < SIZE; $u++){
        $seen = array_fill(0,SIZE,0);
        if(bmp($g,$u,$seen,$matchR)){
            $result++;
        }
    }
    return $result;
}

$bpGraph = [
    [0, 1, 1, 0, 0, 0],
    [1, 0, 0, 1, 0, 0],
    [0, 0, 1, 0, 0, 0],
    [0, 0, 1, 1, 0, 0],
    [0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 1]
];
echo "Maximum number of applicants that can get job is " . maxBPM($bpGraph);