<?php

function isAnagram($a, $b){
    if(strlen($a) != strlen($b)){
        return false;
    }
    $a = str_split($a);
    $b = str_split($b);
    sort($a);
    sort($b);
    if($a == $b){
        return true;
    }
    return false;
}

$a = "geeksforgeeks";
$b = "forgeeksgeeks";

echo isAnagram($a,$b);