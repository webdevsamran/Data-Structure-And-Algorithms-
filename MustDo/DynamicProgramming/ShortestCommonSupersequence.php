<?php

function superSeq($x,$y,$m,$n){
    $dp = array();
    for($i = 0; $i <= $m; $i++){
        for($j = 0; $j <= $n; $j++){
            if(!$i){
                $dp[$i][$j] = $j;
            }else if(!$j){
                $dp[$i][$j] = $i;
            }else if($x[$i-1] == $y[$j-1]){
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