<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function permute(&$str,$l,$r){
    if($l == $r){
        echo implode('',$str)."<br/>";
        return;
    }else{
        for($i = $l; $i <= $r; $i++){
            swap($str[$l],$str[$i]);
            permute($str,$l+1,$r);
            swap($str[$l],$str[$i]);
        }
    }
}

$str = "ABC";
$str = str_split($str);
$n = sizeof($str);

permute($str, 0, $n - 1);