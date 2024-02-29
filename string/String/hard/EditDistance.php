<?php

function editDistance($s,$t){
    $n = strlen($s);
    $m = strlen($t);
    $prev = array_fill(0,$m+1,0);
    $curr = array_fill(0,$m+1,0);
    $s = str_split($s);
    $t = str_split($t);
    for($j = 0; $j <= $m; $j++){
        $prev[$j] = $j;
    }
    for($i = 1; $i <= $n; $i++){
        $curr[0] = $i;
        for($j = 1; $j <= $m; $j++){
            if($s[$i-1] == $t[$j-1]){
                $curr[$j] = $prev[$j-1];
            }else{
                $mn = min(1+$prev[$j],1+$curr[$j-1]);
                $curr[$j] = min($mn,1+$prev[$j-1]);
            }
        }
        $prev = $curr;
    }
    return $prev[$m];
}

$s = "gek";
$t = "gesek";
$ans = editDistance($s, $t);
echo $ans;