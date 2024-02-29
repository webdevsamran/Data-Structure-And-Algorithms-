<?php

function findPowerSet(&$nums){
    $bits = sizeof($nums);
    $pow_set_size = pow(2,$bits);
    sort($nums);
    $ans = array();
    $list = array();

    for($counter = 0; $counter < $pow_set_size; $counter++){
        $subset = array();
        $temp = '';
        for($j = 0; $j < $bits; $j++){
            if($counter & (1 << $j)){
                array_push($subset,$nums[$j]);
                $temp .= (string)($nums[$j]) . "$";
            }
        }
        if(!in_array($temp,$list)){
            array_push($list,$temp);
            array_push($ans,$subset);
        }
    }

    return $ans;
}

$arr = [ 10, 12, 12 ];
$power_set = findPowerSet($arr);

echo "<pre>";
print_r($power_set);