<?php

function kthNonRepeatingChar($string,$k){
    $count = array();
    for($i = 0; $i < strlen($string); $i++){
        if(!array_key_exists($string[$i],$count)){
            $count[$string[$i]] = 0;
        }
        $count[$string[$i]]++;
    }
    $NonRepeating = array();
    foreach($count as $el => $cnt){
        if($cnt == 1){
            array_push($NonRepeating,$el);
        }
    }
    return array_key_exists($k-1,$NonRepeating) ? $NonRepeating[$k-1] : "Not Found!";
}

$str = "geeksforgeeks";
$k = 1;
 
echo kthNonRepeatingChar($str, $k);