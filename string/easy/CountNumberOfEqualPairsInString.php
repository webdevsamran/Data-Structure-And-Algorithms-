<?php

function countPairs($string){
    $count = array();
    
    for($i = 0; $i < strlen($string); $i++){
        if(!array_key_exists($string[$i],$count)){
            $count[$string[$i]] = 0;
        }
        $count[$string[$i]]++;
    }

    $ans = 0;
    print_r($count);

    foreach($count as $el){
        $ans += $el * $el;
    }

    return $ans;
}

$s = "geeksforgeeks";
echo countPairs($s);