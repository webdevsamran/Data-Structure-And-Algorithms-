<?php

function constructBalanceArray(&$BOP,&$BCP,$str,$n){
    $stack = new SplStack;
    $str = str_split($str);
    for($i = 0; $i < $n; $i++){
        if($str[$i] == '('){
            $stack->push($i);
        }else{
            if($stack->isEmpty()){
                $BCP[$i] = 0;
            }else{
                $BCP[$i] = 1;
                $BOP[$stack->pop()] = 1;
            }
        }
    }
    for($i = 1; $i < $n; $i++) {
        $BCP[$i] += $BCP[$i - 1];
        $BOP[$i] += $BOP[$i - 1];
    }
}

function query($BOP, $BCP, $s, $e)
{
    if ($BOP[$s - 1] == $BOP[$s]) {
        return ($BCP[$e] - $BOP[$s]) * 2;
    } else {
        return ($BCP[$e] - $BOP[$s] + 1) * 2;
    }
}

$str = "())(())(())(";
$n = strlen($str);

$BCP = array_fill(0,$n+1,0);
$BOP = array_fill(0,$n+1,0);
constructBalanceArray($BOP, $BCP, $str, $n);

$startIndex = 5;
$endIndex = 11;
echo "Maximum Length Correct Bracket Subsequence between " . $startIndex . " and " . $endIndex . " = " . query($BOP, $BCP, $startIndex, $endIndex) . "<br/>";

$startIndex = 4;
$endIndex = 5;
echo "Maximum Length Correct Bracket Subsequence between " . $startIndex . " and " . $endIndex . " = " . query($BOP, $BCP, $startIndex, $endIndex) . "<br/>";

$startIndex = 1;
$endIndex = 5;
echo "Maximum Length Correct Bracket Subsequence between " . $startIndex . " and " . $endIndex . " = " . query($BOP, $BCP, $startIndex, $endIndex) . "<br/>";