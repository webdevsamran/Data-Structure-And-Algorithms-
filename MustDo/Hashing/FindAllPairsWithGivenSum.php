<?php

function allPairs($a,$b,$x){
    $res = array();
    $map = array();
    for($i = 0; $i < sizeof($b); $i++){
        $map[$b[$i]]++;
    }
    for($i = 0; $i < sizeof($a); $i++){
        if($map[$x-$a[$i]] > 0){
            $temp = [$a[$i],$x-$a[$i]];
            array_push($res, $temp);
        }
    }
    return $res;
}

$A = [1, 2, 4, 5, 7];
$B = [5, 6, 3, 4, 8]; 
$X = 9;

print_r(allPairs($A,$B,$X));