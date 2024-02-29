<?php

function detectCycleUtil($u,$adj,&$visited,&$restack){
    if(!$visited[$u]){
        $visited[$u] = true;
        $restack[$u] = true;
        foreach($adj[$u] as $v){
            if(!$visited[$v] && detectCycleUtil($v,$adj,$visited,$restack)){
                return true;
            }else if($restack[$v]){
                return true;
            }
        }
    }
    $restack[$u] = false;
    return false;
}

function detectCycle($v,$e,$adj){
    $visited = array_fill(0,$v,0);
    $restack = array_fill(0,$v,0);
    for($i = 0; $i < $v; $i++){
        if(!$visited[$i] && detectCycleUtil($i,$adj,$visited,$restack)){
            return true;
        }
    }
    return false;
}

$V = 4;
$E = 4;
$adj = [
    [1],
    [2],
    [3],
    [3],
];

echo detectCycle($V,$E,$adj);