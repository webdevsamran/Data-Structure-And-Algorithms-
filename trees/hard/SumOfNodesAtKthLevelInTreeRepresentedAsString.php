<?php

function sumAtKthLevel($tree,$k){
    $level = -1;
    $sum = 0;
    $n = sizeof($tree);
    for($i = 0; $i < $n; $i++){
        if($tree[$i] == '('){
            $level++;
        }else if($tree[$i] == ')'){
            $level--;
        }else{
            if($level == $k){
                $sum += (int)($tree[$i]);
            }
        }
    }
    return $sum;
}

$tree = str_split("(0(5(6()())(4()(9()())))(7(1()())(3()())))");
$k = 2;
echo sumAtKthLevel($tree, $k);