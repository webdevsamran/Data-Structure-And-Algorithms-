<?php

// function isPowerOfTwo($n){
//     if($n == 0){
//         return 0;
//     }
//     while($n != 1){
//         if($n % 2 != 0){
//             return 0;
//         }
//         $n = $n / 2;
//     }
//     return 1;
// }

// function isPowerOfTwo($n){
//     if($n < 0){
//         return 0;
//     }
//     return $n && (!($n & ($n - 1)));
// }

function isPowerOfTwo($n){
    $cnt = 0;
    while($n > 0){
        if(($n & 1) == 1){
            $cnt++;
        }
        $n = $n >> 1;
    }
    if($cnt == 1){
        return true;
    }
    return false;
}

echo isPowerOfTwo(31) ? "Yes<br/>" : "No<br/>";
echo isPowerOfTwo(64) ? "Yes<br/>" : "No<br/>";