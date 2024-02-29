<?php

function minCut($str){
    $n = strlen($str);
    $cut = array();
    $palindrome = array_fill(0,$n,array_fill(0,$n,0));
    for($i = 0; $i < $n; $i++){
        $minCut = $i;
        for($j = 0; $j <=$i; $j++){
            if($str[$i] == $str[$j] && ($i - $j < 2 || $palindrome[$j + 1][$i - 1])){
                $palindrome[$j][$i] = true;
                $minCut = min($minCut, $j == 0 ? 0 : ($cut[$j - 1] + 1));
            }
        }
        $cut[$i] = $minCut;
    }
    return $cut[$n-1];
}

echo minCut("aab") . "<br/>";
echo minCut("aabababaxx") . "<br/>";