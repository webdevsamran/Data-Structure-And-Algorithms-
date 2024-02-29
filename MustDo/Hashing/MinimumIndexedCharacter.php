<?php

function printMinIndexChar($str, $patt){
    $map = array();
    $minIndex = PHP_INT_MAX;
    $m = strlen($str);
    $n = strlen($patt);
    for($i = 0; $i < $m; $i++){
        if(!array_key_exists($str[$i],$map)){
            $map[$str[$i]] = $i;
        }
    }
    for($i = 0; $i < $n; $i++){
        if(array_key_exists($patt[$i],$map) && $map[$patt[$i]] < $minIndex){
            $minIndex = $map[$patt[$i]];
        }
    }
    if ($minIndex != PHP_INT_MAX)
        echo "Minimum Index Character = " . $str[$minIndex];
    else
        echo "No character present";
}

$str = "geeksforgeeks";
$patt = "set";
printMinIndexChar($str, $patt);