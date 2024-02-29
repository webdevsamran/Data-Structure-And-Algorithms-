<?php

function convertToCamelCase($string){
    $len = strlen($string);
    $ans = array();

    $k = 0;
    for($i = 0; $i < $len;$i++){
        if($string[$i] == ' '){
            $ans[$k++] = strtoupper($string[$i+1]);
            $i += 1;
            continue;
        }
        $ans[$k++] = $string[$i];
    }

    return implode('',$ans);
}

$str = "I get intern at geeksforgeeks"; 
echo convertToCamelCase($str); 