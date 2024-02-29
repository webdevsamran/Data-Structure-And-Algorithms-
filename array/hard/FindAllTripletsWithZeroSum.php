<?php

function findTriplets($arr,$n){
    sort($arr);
    $found = false;
    for($i = 0; $i < $n - 1; $i++){
        $l = $i + 1;
        $r = $n - 1;
        $x = $arr[$i];
        while($l < $r){
            if($x + $arr[$l] + $arr[$r] == 0){
                printf("%d %d %d<br/>", $x, $arr[$l], $arr[$r]);
                $l++;
                $r--;
                $found = true;
            }else if($x + $arr[$l] + $arr[$r] < 0){
                $l++;
            }else{
                $r--;
            }
        }
    }
    if($found == false){
        echo " No Triplet Found <br/>";
    }
}

$arr = [ 0, -1, 2, -3, 1 ];
$n = sizeof($arr);
findTriplets($arr, $n);