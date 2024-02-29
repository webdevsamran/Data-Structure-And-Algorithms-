<?php

function findSmallest($m,$s){
    if($s == 0){
        echo ($m == 1) ? "Smallest number is ". 0 : "Not Possible";
        return;
    }
    if($s > 9 * $m){
        echo "Not Possible";
        return;
    }
    $res = array();
    $s -= 1;
    for($i = $m-1; $i > 0; $i--){
        if($s > 9){
            $res[$i] = 9;
            $s -= 9;
        }else{
            $res[$i] = $s;
            $s = 0;
        }
    }
    $res[0] = $s + 1;
    echo "Smallest Number is : ";
    for($i = 0; $i < $m; $i++){
        echo $res[$i];
    }
}

$s = 20;
$m = 3;
findSmallest($m, $s);