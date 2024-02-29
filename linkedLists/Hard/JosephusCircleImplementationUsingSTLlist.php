<?php

function josephusCircle($n,$k){
    $l = array();
    for($i = 0; $i < $n; $i++){
        array_push($l,$i);
    }
    $it = 0;
    while(sizeof($l) > 1){
        for($i = 1; $i < $k; $i++){
            $it++;
            if($it == sizeof($l)){
                $it = 0;
            }
        }
        unset($l[$it]);
        $l = array_values($l);
        if($it == sizeof($l)){
            $it = 0;
        }
    }
    return $l[0];
}

$n=14;
$k=2;  
echo josephusCircle($n,$k);