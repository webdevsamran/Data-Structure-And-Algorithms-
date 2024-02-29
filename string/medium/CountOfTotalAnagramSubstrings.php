<?php

function countOfAnagramSubstring($string){
    $len = strlen($string);
    $mp = array();
    
    for($i = 0; $i < $len; $i++){
        $freq = array();
        for($j = $i; $j < $len; $j++){
            if(!array_key_exists($string[$i],$freq)){
                $freq[$string[$i]] = 0;
            }
            $freq[$string[$i]]++;

            if(!array_key_exists(serialize($freq),$mp)){
                $mp[serialize($freq)] = 0;
            }
            $mp[serialize($freq)]++;
        }
    }

    echo "<pre>";
    print_r($mp);
    
    $result = 0;
    foreach($mp as $key => $val){
        $freq = $val;
        $result += (($freq) * ($freq-1)) / 2;
    }

    return $result;
}

$str = "xyyx";
echo countOfAnagramSubstring($str);