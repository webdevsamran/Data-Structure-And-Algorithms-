<?php

function superSeq($X,$Y,$m,$n){
    $dp = array_fill(0,$m+1,array_fill(0,$n+1,0));
    for($i = 0; $i <= $m; $i++){
        for($j = 0; $j <= $n; $j++){
            if(!$i){
                $dp[$i][$j] = 0;
            }else if(!$j){
                $dp[$i][$j] = 0;
            }else if($X[$i-1] == $Y[$j-1]){
                $dp[$i][$j] = 1 + $dp[$i-1][$j-1];
            }else{
                $dp[$i][$j] = 1 + min($dp[$i-1][$j],$dp[$i][$j-1]);
            }
        }
    }
    return $dp[$m][$n];
}

$X = "AGGTAB";
$Y = "GXTXAYB";
echo "Length of the shortest supersequence is " . superSeq($X, $Y, strlen($X), strlen($Y));