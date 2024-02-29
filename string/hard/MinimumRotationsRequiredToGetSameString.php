<?php

function findRotations($str){
    $ans = 0;
    $len = strlen($str);
    for($i = 1; $i < $len + 1; $i++){
        $new_str =  substr($str,$i,$i) . substr($str,$i,$len-$i);
        if($new_str == $str){
            $ans = $i;
            break;
        }
    }
    if($ans == 0){
        return $len;
    }
    return $ans;
}

$str = "abc";
echo findRotations($str);