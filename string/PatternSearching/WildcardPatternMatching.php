<?php

function isMatch($string,$pattern){
    $sIDX = 0;
    $pIDX = 0;
    $lastWildcardIdx = -1;
    $sBacktrackIdx = -1;
    $nextToWildcardIdx = -1;

    while($sIDX < strlen($string)){
        if($pIDX < strlen($pattern) && ($pattern[$pIDX] == '?' || $pattern[$pIDX] == $string[$sIDX])){
            $sIDX++;
            $pIDX++;
        }else if($pIDX < strlen($pattern) && $pattern[$pIDX] == "*"){
            $lastWildcardIdx = $pIDX;
            $nextToWildcardIdx = ++$pIDX;
            $sBacktrackIdx = $sIDX;
        }else if($lastWildcardIdx == -1){
            return false;
        }else{
            $pIDX = $nextToWildcardIdx;
            $sIDX = ++$sBacktrackIdx;
        }
    }

    for($i = $pIDX; $i < strlen($pattern); $i++){
        if($pattern[$i] != '*'){
            return false;
        }
    }
    return true;
}

$str = "baaabab";
$pattern = "*****ba*****ab";
// char pattern[] = "ba*****ab";
// char pattern[] = "ba*ab";
// char pattern[] = "a*ab";
// char pattern[] = "a*****ab";
// char pattern[] = "*a*****ab";
// char pattern[] = "ba*ab****";
// char pattern[] = "****";
// char pattern[] = "*";
// char pattern[] = "aa?ab";
// char pattern[] = "b*b";
// char pattern[] = "a*a";
// char pattern[] = "baaabab";
// char pattern[] = "?baaabab";
// char pattern[] = "*baaaba*";
 
if (isMatch($str, $pattern))
    echo "Yes";
else
    echo "No";