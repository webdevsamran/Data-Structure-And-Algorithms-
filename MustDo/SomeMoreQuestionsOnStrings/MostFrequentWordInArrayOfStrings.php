<?php

function findWord($arr){
    $n = sizeof($arr);
    $map = array();
    for($i = 0; $i < $n; $i++){
        $map[$arr[$i]]++;
    }
    $key = "";
    $value = 0;
    foreach($map as $word => $freq){
        if($freq > $value){
            $value = $freq;
            $key = $word;
        }
    }
    return $key;
}

$arr = [ "geeks", "for", "geeks", "a", "portal", "to", "learn", "can", "be", "computer", "science", "zoom", "yup", "fire", "in","be", "data", "geeks" ];
$sol = findWord($arr);
echo $sol;