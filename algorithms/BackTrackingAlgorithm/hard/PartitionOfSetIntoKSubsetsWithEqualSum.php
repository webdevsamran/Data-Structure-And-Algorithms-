<?php

function isKPartitionPossibleRec($arr,&$subsetSum,&$taken,$subset,$k,$n,$curIdx,$limitIdx){
    if($subsetSum[$curIdx] == $subset){
        if($curIdx == $k - 2){
            return true;
        }
        return isKPartitionPossibleRec($arr, $subsetSum, $taken, $subset, $k, $n, $curIdx + 1, $n - 1);
    }
    for($i = $limitIdx; $i >= 0; $i--){
        if($taken[$i]){
            continue;
        }
        $tmp = $subsetSum[$curIdx] - $arr[$i];
        if($tmp <= $subset){
            $taken[$i] = true;
            $subsetSum[$curIdx] += $arr[$i];
            $nxt = isKPartitionPossibleRec($arr, $subsetSum, $taken, $subset, $k, $n, $curIdx, $i - 1);
            $taken[$i] = false;
            $subsetSum[$curIdx] -= $arr[$i];
            if($nxt){
                return true;
            }
        }
    }
    return false;
}

function isKPartitionPossible($arr,$n,$k){
    if($k == 1){
        return true;
    }
    if($n < $k){
        return false;
    }
    $sum = 0;
    for($i = 0; $i < $n; $i++){
        $sum += $arr[$i];
    }
    if($sum % $k != 0){
        return false;
    }
    $subset = (int)($sum/$k);
    $subsetSum = array_fill(0,$k,0);
    $taken = array_fill(0,$k,0);

    $subsetSum[0] = $arr[$n-1];
    $taken[$n-1] = 1;

    return isKPartitionPossibleRec($arr,$subsetSum,$taken,$subset,$k,$n,0,$n-1);
}

$arr = [2, 1, 4, 5, 3, 3];
$N = sizeof($arr);
$K = 3;

if (isKPartitionPossible($arr, $N, $K))
    echo "Partitions into equal sum is possible.<br/>";
else
    echo "Partitions into equal sum is not possible.<br/>";