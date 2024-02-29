<?php

function lcs($s1,$s2,$m,$n){
    $L = array();
    for($i = 0; $i <= $m; $i++){
        for($j = 0; $j <= $n; $j++){
            if($i == 0 || $j == 0){
                $L[$i][$j] = 0;
            }else if($s1[$i-1] == $s2[$j-1]){
                $L[$i][$j] = 1 + $L[$i-1][$j-1];
            }else{
                $L[$i][$j] = max($L[$i-1][$j],$L[$i][$j-1]);
            }
        }
    }
    return $L[$m][$n];
}

$S1 = "AGGTAB";
$S2 = "GXTXAYB";
$m = strlen($S1);
$n = strlen($S2);
echo "Length of LCS is " . lcs($S1, $S2, $m, $n);