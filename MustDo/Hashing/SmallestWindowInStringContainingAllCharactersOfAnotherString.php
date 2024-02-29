<?php

function Minimum_Window($s, $t){
    $m = array();
    $ans = PHP_INT_MAX;
    $start = $count = 0;
    for($i = 0; $i < strlen($t); $i++){
        if(!array_key_exists($t[$i],$m)){
            $count++;
            $m[$t[$i]]++;
        }
        $m[$t[$i]]++;
    }
    $i = $j = 0;
    while($j < strlen($s)){
        $m[$s[$j]]--;
        if($m[$s[$j]] == 0){
            $count--;
        }
        if($count == 0){
            while($count == 0){
                if($ans > $j - $i + 1){
                    $ans = min($ans, $j - $i + 1);
                    $start = $i;
                }
                $m[$s[$i]]++;
                if($m[$s[$i]] > 0){
                    $count++;
                }
                $i++;
            }
        }
        $j++;
    }
    if ($ans != PHP_INT_MAX)
        return substr($s, $start, $ans);
    else
        return "-1";
}

$s = "zoomlazapzo";
$t = "oza";
echo Minimum_Window($s, $t);