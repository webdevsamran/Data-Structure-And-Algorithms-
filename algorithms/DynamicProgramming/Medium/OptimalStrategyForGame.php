<?php

define('maxSize',3000);
$dp = array();
$leftBag = array();

function maxScore($bags){
    global $dp, $leftBag;
    $n = sizeof($bags);
    $totalTurns = $n;
    $turn = ($totalTurns % 2 == 0) ? 0 : 1;
    for($i = 0; $i < $n; $i++){
        $dp[$i][$i] = $turn ? $bags[$i] : 0;
        $leftBag[$i][$i] = 1;
    }
    $turn = !$turn;
    $sz = 1;
    while($sz < $n){
        for($i = 0; $i + $sz < $n; $i++){
            $scoreOne = $dp[$i + 1][$i + $sz];
            $scoreTwo = $dp[$i][$i + $sz - 1];
            if($turn){
                $dp[$i][$i + $sz] = max($bags[$i] + $scoreOne, $bags[$i + $sz] + $scoreTwo);
                if($bags[$i] + $scoreOne > $bags[$i+$sz] + $scoreTwo){
                    $leftBag[$i][$i + $sz] = 1;
                }else{
                    $leftBag[$i][$i + $sz] = 0;
                }
            }else{
                $dp[$i][$i + $sz] = min($scoreOne, $scoreTwo);
                if($scoreOne < $scoreTwo){
                    $leftBag[$i][$i + $sz] = 1;
                }else{
                    $leftBag[$i][$i + $sz] = 0;
                }
            }
        }
        $turn = !$turn;
        $sz++;
    }
    return $dp[0][$n-1];
}

function getMoves($n){
    global $dp, $leftBag;
    $moves = array();
    $left = 0;
    $right = $n - 1;
    while($left <= $right){
        if($leftBag[$left][$right]){
            array_push($moves,'L');
            $left++;
        }else{
            array_push($moves,'R');
            $right--;
        }
    }
    return implode('',$moves);
}

$ar = [ 10, 80, 90, 30 ];
$bags = $ar;
$ans = maxScore($bags);
echo $ans . " " . getMoves(sizeof($bags));