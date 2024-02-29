<?php

function MaxNumber($arr,$N,$K){
    $map = array();
    for($i = 0; $i < $N; $i++){
        if(!array_key_exists($arr[$i],$map)){
            $map[$arr[$i]] = 1;
        }else{
            if($K != 0){
                $K--;
                continue;
            }
            $map[$arr[$i]]++;
        }
    }
    if($K == 0){
        $count = 0;
        foreach($map as $key => $val){
            if($val > 1){
                continue;
            }else{
                $count++;
            }
        }
        return $count;
    }else{
        $count = 0;
        foreach($map as $key => $val){
            if($val > 1){
                continue;
            }
            if($K != 0){
                $K--;
                continue;
            }else{
                $count++;
            }
        }
        return $count;
    }
}

// $arr = [ 10, 10, 10, 50, 50, 100, 100 ];
// $arr = [5, 7, 5, 5, 1, 2, 2];
$arr = [1, 2, 3, 4, 5, 6, 7];
// $arr = [1, 2, 2, 2];
$K = 1;

$N = sizeof($arr);
echo MaxNumber($arr, $N, $K);