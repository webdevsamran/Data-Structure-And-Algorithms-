<?php

function minStepToDeleteString($str){
    $n = strlen($str);
    $dp = array_fill(0,$n+1,array_fill(0,$n+1,0));
    for($len = 1; $len <= $n; $len++){
        for($i = 0, $j = $len - 1; $j < $n; $i++, $j++){
            if($len == 1){
                $dp[$i][$j] = 1;
            }else{
                $dp[$i][$j] = 1 + $dp[$i + 1][$j];
                if($str[$i] == $str[$i+1]){
                    $dp[$i][$j] = min($dp[$i][$j], 1 + $dp[$i + 2][$j]);
                }
                for($k = $i + 2; $k <= $j; $k++){
                    if ($str[$i] == $str[$k])
                        $dp[$i][$j] = min($dp[$i][$j], $dp[$i+1][$k-1] + $dp[$k+1][$j]);
                }
            }
        }
    }
    return $dp[0][$n-1];
}

$str = "2553432";
echo minStepToDeleteString($str);