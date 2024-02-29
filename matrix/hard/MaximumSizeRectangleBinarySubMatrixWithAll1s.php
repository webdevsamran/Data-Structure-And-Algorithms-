<?php

define('SIZE',4);

function maxHist($A){
    $result = new SplStack;
    $top_val = NULL;
    $max_area = 0;
    $area = 0;
    $i = 0;

    while($i < SIZE){
        if($result->isEmpty() || $A[$result->top()] <= $A[$i]){
            $result->push($i++);
        }else{
            $top_val = $A[$result->pop()];
            $area = $top_val * $i;
            if(!$result->isEmpty()){
                $area = $top_val * ($i - $result->top() - 1);
            }
            $max_area = max($max_area,$area);
        }
    }

    while(!$result->isEmpty()){
        $top_val = $A[$result->pop()];
        $area = $top_val * $i;
        if(!$result->isEmpty()){
            $area = $top_val * ($i - $result->top() - 1);
        }
        $max_area = max($max_area,$area);
    }

    return $max_area;
}

function maxRectangle($A){
    $result = maxHist($A[0]);
    for($i = 1; $i < SIZE; $i++){
        for($j = 0; $j < SIZE; $j++){
            if($A[$i][$j]){
                $A[$i][$j] += $A[$i-1][$j];
            }
            $result = max($result,maxHist($A[$i]));
        }
    }
    return $result;
}

$A = [
    [ 0, 1, 1, 0 ],
    [ 1, 1, 1, 1 ],
    [ 1, 1, 1, 1 ],
    [ 1, 1, 0, 0 ],
];

echo "Area of maximum rectangle is " . maxRectangle($A);