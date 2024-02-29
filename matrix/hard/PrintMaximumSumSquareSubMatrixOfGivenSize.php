<?php

define('N',5);

function printMaxSumSub($mat,$k){
    if($k > N){
        return;
    }
    $stripSum = array();
    for($j = 0; $j < N; $j++){
        $sum = 0;
        for($i = 0; $i < $k; $i++){
            $sum += $mat[$i][$j];
        }
        $stripSum[0][$j] = $sum;
        for($i = 1; $i < N - $k + 1; $i++){
            $sum += ($mat[$i + $k - 1][$j] - $mat[$i - 1][$j]);
            $stripSum[$i][$j] = $sum;
        }
    }
    $max_sum = PHP_INT_MIN;
    $pos = array();
    for($i = 0; $i < N - $k + 1; $i++){
        $sum = 0;
        for($j = 0; $j < $k; $j++)
            $sum += $stripSum[$i][$j];
        if ($sum > $max_sum) {
            $max_sum = $sum;
            $pos[] = &$mat[$i][0];
        }
        for($j = 1; $j < N - $k + 1; $j++) {
            $sum += ($stripSum[$i][$j + $k - 1] - $stripSum[$i][$j - 1]);
            if ($sum > $max_sum) {
                $max_sum = $sum;
                $pos[] = &$mat[$i][$j];
            }
        }
    }
    echo "<pre>";
    print_r($pos);
    // for($i = 0; $i < $k; $i++) {
    //     for($j = 0; $j < $k; $j++)
    //         echo $pos + $i * N + $j . " ";
    //     echo " ";
    // }
}

$mat = [
    [ 1, 1, 1, 1, 1 ],
    [ 2, 2, 2, 2, 2 ],
    [ 3, 8, 6, 7, 3 ],
    [ 4, 4, 4, 4, 4 ],
    [ 5, 5, 5, 5, 5 ]
];
$k = 3;

echo "Maximum sum 3 x 3 matrix is<br/>";
printMaxSumSub($mat, $k);