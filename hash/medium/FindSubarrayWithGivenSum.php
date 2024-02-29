<?php

function subArraySum($arr,$size,$sum){
    $map = array();
    $curr_sum = 0;

    for($i = 0; $i < $size; $i++){
        $curr_sum += $arr[$i];
        if($curr_sum == $sum){
            echo "Found From Position 0 To ".$i." <br/>";
            return;
        }
        if(array_key_exists(($curr_sum-$sum),$map)){
            echo "Found At Position From ".(int)($map[$curr_sum-$sum]+1)." to ".$i." <br/>";
            return;
        }
        $map[$curr_sum] = $i;
    }
    echo "Not Found";
}

$arr = [ 10, 2, -2, -20, 10 ];
$n = sizeof($arr);
$sum = -10;

subArraySum($arr, $n, $sum);