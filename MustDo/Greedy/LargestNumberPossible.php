<?php

function largest_number($sum,$d){
    if($sum == 0){
        return 0;
    }
    if($sum > 9 * $d){
        return -1;
    }
    $result = array();
    for($i = 0; $i < $d; $i++){
        if($sum >= 9){
            $result[] = '9';
            $sum -= 9;
        }else{
            $result[] = $sum;
            $sum = 0;
        }
        if($sum == 0 && $i < $d - 1){
            $result[] = $d - $i - 1;
            break;
        }
    }
    return implode('',$result);
}

echo largest_number(9, 2) . "<br/>";
echo largest_number(20, 3) . "<br/>";