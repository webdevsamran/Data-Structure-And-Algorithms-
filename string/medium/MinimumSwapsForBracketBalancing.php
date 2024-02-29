<?php

function swapCount($str){
    $len = strlen($str);
    $swap = 0;
    $imbalance = 0;
    $countLeft = 0;
    $countRight = 0;

    for($i = 0; $i < $len; $i++){
        if($str[$i] == '['){
            $countLeft++;
            if($imbalance > 0){
                $swap += $imbalance;
                $imbalance--;
            }
        }else{
            $countRight++;
            $imbalance = (int)($countRight-$countLeft);
        }
    }

    return $swap;
}

$str = "[]][][";
echo swapCount($str)."<br/>";

$str = "[[][]]";
echo swapCount($str)."<br/>";