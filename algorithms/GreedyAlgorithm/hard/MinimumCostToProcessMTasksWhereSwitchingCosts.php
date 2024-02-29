<?php

function find($arr, $pos, $m, $isRunning)
{
    $d = array_fill(0,$m + 1, 0);
    for ($i = $m; $i > $pos; $i--)
    {
        if ($isRunning[$arr[$i]])
            $d[$arr[$i]] = $i;
    }
    $maxipos = 0;
    foreach ($d as $ele)
        $maxipos = max($ele, $maxipos);
 
    return $maxipos;
}

function mincost($n,$m,$arr){
    $freqArr = array();
    $new_vec = array_fill(0,$m+1,0);
    $freqArr[$m-1] = 0;
    for($i = $m - 2; $i >= 0; $i--){
        $nv = array();
        $nv = $freqArr[$i+1];
        $nv[$freqArr[$i+1]] = 1;
        $freqArr[$i] = $nv;
    }
    $isRunning = array_fill(0,$m+1,0);
    $cost = 0;
    $true_count = 0;
    for($i = 0; $i < $m; $i++){
        $ele = $arr[$i];
        if($isRunning[$ele] == 1){
            continue;
        }else{
            if($true_count < $n){
                $cost += 1;
                $true_count += 1;
                $isRunning[$ele] = 1;
            }else{
                $mini = 100000;
                $minind = 0;
                for ($j = 1; $j <= $m; $j++) {
                    if ($isRunning[$j] && $mini > $freqArr[$i][$j]) {
                        $mini = $freqArr[$i][$j];
                        $miniind = $j;
                    }
                }
                if ($mini == 0) {
                    $isRunning[$miniind] = false;
                    $isRunning[$ele] = true;
                    $cost += 1;
                }
                else {
                    $farpos = find($arr, $i, $m, $isRunning);
                    $isRunning[$arr[$farpos]] = false;
                    $isRunning[$ele] = true;
                    $cost += 1;
                }
            }
        }
    }
    return $cost;
}

$n1 = 3;
$m1 = 6;
$arr1 = [ 1, 2, 1, 3, 4, 1 ];
echo mincost($n1, $m1, $arr1);