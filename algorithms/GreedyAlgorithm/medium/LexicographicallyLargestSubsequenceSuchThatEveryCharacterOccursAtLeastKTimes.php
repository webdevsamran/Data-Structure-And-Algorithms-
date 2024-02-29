<?php

function subsequence($s,$size,$k){
    $map = array();
    $s = str_split($s);

    for($i = 0; $i < $size; $i++){
        if(!array_key_exists(ord($s[$i]),$map)){
            $map[ord($s[$i])] = 1;
            continue;
        }
        $map[ord($s[$i])]++;
    }
    ksort($map);
    $last = -1;
    foreach($map as $key=> $val){
        if($val == 2){
            $last = $key;
        }
    }
    if($last == -1){
        echo "Nothing Found!";
        return;
    }
    echo str_repeat(chr($last),2);
}

$s = "banana";
$n = strlen($s);
$k = 2;
subsequence($s, $n, $k);