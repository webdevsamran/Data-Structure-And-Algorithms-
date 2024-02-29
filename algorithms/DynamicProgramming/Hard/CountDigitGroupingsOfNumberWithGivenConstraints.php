<?php

function countGroups($str){
    $n = strlen($str);
    $x = 0;
    for($i = 0; $i < $n; $i++){
        $x += (int)($str[$i]);
    }
    $dp = array_fill(0,$n-1,array_fill(0,$x+1,0));
    for($s = 0; $s <= $x; $s++){
        $dp[$n][$s] = 1;
    }
    for($position = $n - 1; $position >= 0; $position--){
        for($previous_sum = 0; $previous_sum <= $x; $previous_sum++){
            $sum = $res = 0;
            for($i = $position; $i < $n; $i++){
                $sum += (int)($str[$i]);
                if($sum >= $previous_sum){
                    $res += $dp[$i+1][$sum];
                }
            }
            $dp[$position][$previous_sum] = $res;
        }
    }
    return $dp[0][0];
}

$str = "1119";
echo "number of groupings : " . countGroups($str);