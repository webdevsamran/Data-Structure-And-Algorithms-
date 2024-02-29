<?php

function countSubsequences($s){
    $aCount = 0;
    $bCount = 0;
    $cCount = 0;
    $n = strlen($s);
    for($i = 0; $i < $n; $i++){
        if($s[$i] == 'a'){
            $aCount = (1 + 2 * $aCount);
        }else if($s[$i] == 'b'){
            $bCount = ($aCount + 2 * $bCount);
        }else if($s[$i] == 'c'){
            $cCount = ($bCount + 2 * $cCount);
        }
    }
    return $cCount;
}

$s = "abbbc";
echo countSubsequences($s);