<?php

function missingNumber($arr,$n){
    sort($arr);
    for($i = 1; $i <= $n; $i++){
        if($i != $arr[$i-1]){
            echo "Missing Number is: " . $i;
            return;
        }
    }
    return;
}

$arr = [1,2,4,5,7,8,3];
missingNumber($arr,8);