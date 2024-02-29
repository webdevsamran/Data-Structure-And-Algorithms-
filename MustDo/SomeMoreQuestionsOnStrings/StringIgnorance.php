<?php

function printStringAlternate($str){
    $occ = array();
    $n = strlen($str);
    for($i = 0; $i < $n; $i++){
        if(!array_key_exists(strtolower($str[$i]),$occ)){
            $occ[$str[$i]] = 0;
        }
        $temp = strtolower($str[$i]);
        $occ[$temp]++;
        if($occ[$temp] & 1){
            echo $str[$i];
        }
    }
    echo "<br/>";
}

$str = "Geeks for geeks";
$str2 = "It is a long day Dear";

printStringAlternate($str);
printStringAlternate($str2);