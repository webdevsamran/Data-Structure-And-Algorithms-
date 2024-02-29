<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function rearrange(&$arr,$n){
    $k = 1;
    $sign = ($arr[0] > 0) ? 'P' : 'N';
    for($i = 0; $i < $n; $i++){
        if($sign == 'P' && $arr[$i] < 0){
            if($arr[$k] > 0){
                swap($arr[$i],$arr[$k]);
                $k++;
                if($arr[$k] > 0){
                    $k++;
                }
            }
        }else if($sign == 'N' && $arr[$i] > 0){
            if($arr[$k] < 0){
                swap($arr[$i],$arr[$k]);
                $k++;
                if($arr[$k] < 0){
                    $k++;
                }
            }
        }
    }
    if($sign == 'N' && $arr[$n-1] < 0){
        swap($arr[$n-1],$arr[++$k]);
    }
    if($sign == 'P' && $arr[$n-1] > 0){
        swap($arr[$n-1],$arr[++$k]);
    }
}

$arr = [ -5, -2, 5, 2, 4, 7, 1, 8, 0, -8 ];
$n = sizeof($arr);

echo "Given array is <br/>";
print_r($arr);
rearrange($arr, $n);
echo "<br/>Rearranged array is <br/>";
print_r($arr);