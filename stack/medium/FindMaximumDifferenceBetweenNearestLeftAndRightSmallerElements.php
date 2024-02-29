<?php

function leftSmaller($arr,$n,&$SE){
    $stack = new SplStack;
    for($i = 0; $i < $n; $i++){
        while(!$stack->isEmpty() && $stack->top() >= $arr[$i]){
            $stack->pop();
        }
        if($stack->isEmpty()){
            $SE[$i] = 0;
        }else{
            $SE[$i] = $stack->top();
        }
        $stack->push($arr[$i]);
    }
}

function findMaxDiff($arr,$n){
    $LS = array();
    leftSmaller($arr,$n,$LS);
    $arr = array_reverse($arr);
    $RS = array();
    leftSmaller($arr,$n,$RS);

    $result = -1;
    echo "<pre>";
    print_r($LS);
    print_r($RS);
    echo "</pre><br/>";
    for($i = 0; $i < $n; $i++){
        $result = max($result,abs($LS[$i]-$RS[$n-$i-1]));
    }
    return $result;
}

$arr = [2, 4, 8, 7, 7, 9, 3];
$n = sizeof($arr);
echo "Maximum diff : " . findMaxDiff($arr, $n) . "<br/>";