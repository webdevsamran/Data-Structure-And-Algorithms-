<?php

function detectCycleUtil($i,&$visited,$adj,$parent){
    $visited[$i] = true;
    foreach($adj[$i] as $v){
        if(!$visited[$v]){
            if(detectCycleUtil($v,$visited,$adj,$i)){
                return true;
            }else if($v != $parent){
                return true;
            }
        }
    }
    return false;
}

function detectCycle($v,$e,$adj){
    $visited = array_fill(0,$v,0);
    for($u = 0; $u < $v; $u++){
        if(!$visited[$u]){
            if(detectCycleUtil($u,$visited,$adj,-1)){
                return true;
            }
        }
    }
    return false;
}

$V = 5;
$E = 5;
$adj = [
    [1],
    [0, 2, 4],
    [1, 3],
    [2, 4],
    [1, 3]
];

echo detectCycle($V,$E,$adj);