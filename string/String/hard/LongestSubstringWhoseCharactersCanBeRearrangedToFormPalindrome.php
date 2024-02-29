<?php

function isPlaindrome($str){
    $n = strlen($str);
    $hashmap = array();
    $str = str_split($str);
    for($i = 0; $i < $n; $i++){
        if(!array_key_exists($str[$i],$hashmap)){
            $hashmap[$str[$i]] = 0;
        }
        $hashmap[$str[$i]]++;
    }
    $count = 0;
    foreach($hashmap as $ele => $freq) {
        if ($freq % 2 == 1)
            $count++;
    }
    if ($count > 1) {
        return false;
    }
    return true;
}

// function isPlaindrome($str){
//     $i = 0;
//     $j = strlen($str) - 1;
//     while($i < $j){
//         if($str[$i] != $str[$j]){
//             return false;
//         }
//         $i++;
//         $j--;
//     }
//     return true;
// }

function longestSubstring($s,$n){
    $ans = 0;
    $s = str_split($s);
    for($i = 0; $i < $n; $i++){
        $cur_str = '';
        for($j = $i; $j < $n; $j++){
            $cur_str .= $s[$j];
            if(isPlaindrome($cur_str)){
                $ans = max($ans,$j - $i + 1);
            }
        }
    }
    return $ans;
}

$s = "adbabd";
$n = strlen($s);
echo longestSubstring($s, $n);