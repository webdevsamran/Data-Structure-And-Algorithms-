<?php

function minRange($arr,$size,$k){
    $map = array();
    $start = 0;
    $end = $size;
    $i = 0;
    $j = 0;

    while($j < $size){
        if(!array_key_exists($arr[$j],$map)){
            $map[$arr[$j]] = 0;
        }
        $map[$arr[$j]]++;
        $j++;

        if(sizeof($map) < $k){
            continue;
        }

        while(sizeof($map) == $k){
            $windowLen = $j - $i;
            $subArrayLen = $end - $start + 1;

            if($subArrayLen > $windowLen){
                $start = $i;
                $end = $j - 1;
            }

            if($map[$arr[$i]] == 1){
                unset($map[$arr[$i]]);
            }else{
                $map[$arr[$i]]--;
            }

            $i++;
        }

    }
    if($start == 0 && $end == $size){
        echo "Invalid K <br/>";
    }else{
        echo "From " . $start . " To " . $end . "<br/>";
    }
}

$arr = [ 1, 1, 2, 2, 3, 3, 4, 5 ];
$n = sizeof($arr);
$k = 3;
minRange($arr, $n, $k);