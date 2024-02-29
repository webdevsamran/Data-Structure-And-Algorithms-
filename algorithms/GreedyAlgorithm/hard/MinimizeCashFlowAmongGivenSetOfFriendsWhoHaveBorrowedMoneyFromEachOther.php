<?php

define('N', 3);

function getMin($amount){
    $minInd = 0;
    for($i = 1; $i < N; $i++){
        if($amount[$i] < $amount[$minInd]){
            $minInd = $i;
        }
    }
    return $minInd;
}

function getMax($amount){
    $maxInd = 0;
    for($i = 1; $i < N; $i++){
        if($amount[$i] > $amount[$maxInd]){
            $maxInd = $i;
        }
    }
    return $maxInd;
}

function minCashFlowRec(&$amount){
    $mxCredit = getMax($amount);
    $mxDebit = getMin($amount);
    if($amount[$mxCredit] == 0 && $amount[$mxDebit] == 0){
        return;
    }
    $min = min(abs($amount[$mxDebit]), $amount[$mxCredit]);
    $amount[$mxCredit] -= $min;
    $amount[$mxDebit] += $min;
    echo "Person " . $mxDebit . " pays " . $min . " to " . "Person " . $mxCredit . "<br/>";
    minCashFlowRec($amount);
}

function minCashFlow($graph){
    $amount = array_fill(0,N,0);
    for($p = 0; $p < N; $p++){
        for($i = 0; $i < N; $i++){
            $amount[$p] += ($graph[$i][$p] -  $graph[$p][$i]);
        }
    }
    minCashFlowRec($amount); 
}

$graph = [ 
    [0, 1000, 2000],
    [0, 0, 5000],
    [0, 0, 0]
];

minCashFlow($graph);