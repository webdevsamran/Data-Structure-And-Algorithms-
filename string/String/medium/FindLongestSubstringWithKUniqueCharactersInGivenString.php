<?php

function longestKSubstr($s, $k){
    $i = $j = 0;
    $ans = -1;
    $map = array();
    while($j < strlen($s)){
        $map[$s[$j]]++;
        while(sizeof($map) > $k){
            $map[$s[$i]]--;
            if($map[$s[$i]] == 0){
                unset($map[$s[$i]]);
            }
            $i++;
        }
        if(sizeof($map) == $k){
            $ans = max($ans, $j - $i + 1);
        }
        $j++;
    }
    return $ans;
}

$s = "aabacbebebe";
$k = 3;
echo longestKSubstr($s, $k);