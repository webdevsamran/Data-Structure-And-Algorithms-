<?php

// function findLargestPower($n){
//     $x = 0;
//     while((1 << $x) <= $n){
//         $x++;
//     }
//     return $x - 1;
// }

// function countSetBits($n){
//     if($n <= 1){
//         return $n;
//     }
//     $x = findLargestPower($n);
//     return ($x * pow(($x - 1), 2)) + ($n - pow($x, 2) + 1) + countSetBits($n - pow($x, 2));
// }

function countSetBits($N){
    $two = 2;
    $ans = 0;
    $n = $N;
    while($n){
        $ans += (int)($N/$two) * ($two >> 1);
        if(($N & ($two - 1)) > ($two >> 1) - 1){
            $ans += ($N & ($two - 1)) - ($two >> 1) + 1;
        }
        $two <<= 1;
        $n >>= 1;
    }
    return $ans;
}

$N = 17;
echo countSetBits($N);