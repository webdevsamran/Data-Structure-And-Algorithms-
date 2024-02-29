<?php

function repeatedStringMatch($a, $b){
    $m = strlen($a);
    $n = strlen($b);
    $count = NULL;
    $found = false;
    for($i = 0; $i < $m; $i++){
        $j = $i;
        $k = 0;
        $count = 1;
        while($k < $n && $a[$j] == $b[$k]){
            if($k == $n - 1){
                $found = true;
                break;
            }
            $j= ($j + 1) % $m;
            if($j == 0){
                $count++;
            }
            $k++;
        }
        if($found){
            return $count;
        }
    }
    return -1;
}

$A = "abcd";
$B = "cdabcdab";
echo repeatedStringMatch($A, $B);