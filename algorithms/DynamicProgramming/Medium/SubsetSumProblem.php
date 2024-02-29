<?php

$tab = array_fill(0,2000,array_fill(0,2000,-1));

function subsetSum($a,$n,$sum){
    global $tab;
    if($sum == 0){
        return 1;
    }
    if($n <= 0){
        return 0;
    }
    if($tab[$n-1][$sum] != -1){
        return $tab[$n-1][$sum];
    }
    if($a[$n-1] > $sum){
        return $tab[$n - 1][$sum] = subsetSum($a, $n - 1, $sum);
    }else{
        return $tab[$n - 1][$sum] = subsetSum($a, $n - 1, $sum) || subsetSum($a, $n - 1, $sum - $a[$n - 1]);
    }
}

$n = 5;
$a = [1, 5, 3, 7, 4];
$sum = 12;
if (subsetSum($a, $n, $sum))
{
    echo "YES";
}else
    echo "NO";