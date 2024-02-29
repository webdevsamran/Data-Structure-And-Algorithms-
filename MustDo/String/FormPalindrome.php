<?php

function countMin($str){
    $n = strlen($str);
    $map = array();
    for($i = 0; $i < $n; $i++){
        $map[$str[$i]]++;
    }
    $count = 0;
    foreach($map as $el => $freq){
        if($freq % 2 != 0){
            $count++;
        }
    }
    return $count == 1 ? 0 : $count - 1;
}

$str = "abcd";
echo countMin($str);