<?php

$block = NULL;

function compare($a,$b){
    global $block;
    if((int)($a[0]/$block) != (int)($b[0]/$block)){
        return $a[0] > $b[0]; 
    }
    return $a[1] > $b[1]; 
}

function queryResults($a,$n,$q,$m){
    global $block;
    $block = (int)sqrt($n);
    usort($q,"compare");
    $cur_sum = 0;
    $curr_L = 0;
    $curr_R = 0;

    for($i = 0; $i < $m; $i++){
        $L = $q[$i][0];
        $R = $q[$i][1];
        while($curr_L < $L){
            $cur_sum -= $a[$curr_L];
            $curr_L++;
        }
        while($curr_L > $L){
            $cur_sum += $a[$curr_L];
            $curr_L--;
        }
        while($curr_R <= $R){
            $cur_sum += $a[$curr_R];
            $curr_R++;
        }
        while($curr_R > $R + 1){
            $cur_sum -= $a[$curr_R];
            $curr_R--;
        }
        echo "Sum of [" . $L . ", " . $R . "] is "  . $cur_sum . "<br/>";
    }
}

$a = [1, 1, 2, 1, 3, 4, 5, 2, 8];
$n = sizeof($a);
$q = [[0, 4], [1, 3], [2, 4]];
$m = sizeof($q);
queryResults($a, $n, $q, $m);