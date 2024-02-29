<?php

function smallestWindow($str,$pat){
    if(empty($str) || empty($pat)){
        return '-1';
    }
    $freq_map = array();
    for($i = 0; $i < strlen($pat); $i++){
        if(!array_key_exists($pat[$i],$freq_map)){
            $freq_map[$pat[$i]] = 0;
        }
        $freq_map[$pat[$i]]++;
    }
    $i = $j = $left = $right = $found = 0;
    $count = sizeof($freq_map);
    $min_len = strlen($str);
    while($j < $min_len){
        $end_char = $str[$j++];
        if(array_key_exists($end_char,$freq_map)){
            $freq_map[$end_char]--;
            if($freq_map[$end_char] == 0){
                $count--;
            }
        }
        if($count > 0){
            continue;
        }
        while($count == 0){
            $start_char = $str[$i++];
            if(array_key_exists($start_char,$freq_map)){
                $freq_map[$start_char]++;
                if($freq_map[$start_char] > 0){
                    $count++;
                }
            }
        }
        if(($j - $i) < $min_len){
            $left = $i - 1;
            $right = $j;
            $min_len = $j - $i;
            $found = true;
        }
    }
    return $found ? substr($str,$left,$right-$left) : '-1';
}

$str = "this is a test string";
$pat = "tist";
echo smallestWindow($str, $pat);