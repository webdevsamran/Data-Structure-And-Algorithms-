<?php

function signum($n){
    if($n != 0){
        return ($n > 0) ? 1 : -1;
    }else{
        return 0;
    }
}

function maxZigZag($seq,$n){
    if($n == 0){
        return 0;
    }
    $lastSign = 0;
    $length = 1;
    for($i = 1; $i < $n; $i++){
        $sign = signum($seq[$i] - $seq[$i - 1]);
        if($sign != $lastSign && $sign != 0){
            $lastSign = $sign;
            $length++;
        }
    }
    return $length;
}

$sequence1 = [ 1, 3, 6, 2 ];
$sequence2 = [ 5, 0, 3, 1, 0 ];
$n1 = sizeof($sequence1);
$n2 = sizeof($sequence2);
$maxLength1 = maxZigZag($sequence1, $n1);
$maxLength2 = maxZigZag($sequence2, $n2);
echo "The maximum length of zig-zag sub-sequence in first sequence is: " . $maxLength1;
echo "<br/>";
echo "The maximum length of zig-zag sub-sequence in second sequence is: " . $maxLength2;