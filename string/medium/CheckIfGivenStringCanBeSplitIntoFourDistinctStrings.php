<?php

function check($string){
    $len = strlen($string);
    if($len >= 10){
        return true;
    }

    for($i = 1; $i < $len; $i++){
        for($j = $i + 1; $j < $len; $j++){
            for($k = $j + 1; $k < $len; $k++){
                $s1 = substr($string,0,$i);
                $s2 = substr($string,$i,$j-$i);
                $s3 = substr($string,$j,$k-$j);
                $s4 = substr($string,$k,$len - $k);
                if($s1 != $s2 && $s1 != $s3 && $s1 != $s4 && $s2 != $s3 && $s2 != $s4 && $s3 != $s4){
                    return true;
                }
            }
        }
    }

    return false;
}

$str = "aaabb";
 
echo check($str) ? "Yes" : "No" ;

$str1 = "geeksforgeeks";
echo check($str1) ? "Yes" : "No" ;