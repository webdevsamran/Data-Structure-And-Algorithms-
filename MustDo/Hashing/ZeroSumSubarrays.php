<?php

function findSubArrays($arr, $n){
    $map = array();
    $out = array();
    $sum = 0;
    for($i = 0; $i < $n; $i++){
        $sum += $arr[$i];
        if($sum == 0){
            array_push($out,[0, $i]);
        }
        if(array_key_exists($sum,$map)){
            $vc = $map[$sum];
            foreach($vc as $val){
                array_push($out, [$val + 1, $i]);
            }
        }
        $map[$sum][] = $i;
    }
    return $out;
}

function printOut($out)
{
    foreach($out as $val)
        echo "Subarray found from Index " . $val[0] . " to " . $val[1] . "<br/>";
}

$arr = [ 6, 3, -1, -3, 4, -2, 2, 4, 6, -12, -7];
$n = sizeof($arr);
$out = findSubArrays($arr, $n);
if (sizeof($out) == 0)
    echo "No subarray exists";
else
    printOut($out);