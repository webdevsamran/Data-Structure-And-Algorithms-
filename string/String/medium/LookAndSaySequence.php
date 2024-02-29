<?php

function countnndSay($n){
    if($n == 1){
        return '1';
    }
    if($n == 2){
        return '11';
    }
    $str = '11';
    for($i = 3; $i <= $n; $i++){
        $str .= '$';
        $len = strlen($str);
        $cnt = 1;
        $tmp = '';
        for($j = 1; $j < $len; $j++){
            if($str[$j] == $str[$j-1]){
                $cnt++;
            }else{
                $tmp .= $cnt;
                $tmp .= $str[$j-1];
                $cnt = 1;
            }
        }
        $str = $tmp;
    }
    return $str;
}

$N = 3;
echo countnndSay($N);