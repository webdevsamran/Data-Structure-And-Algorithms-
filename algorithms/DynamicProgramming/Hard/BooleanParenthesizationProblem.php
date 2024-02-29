<?php

function countParenth($symbols, $operators, $n){
    $F = $T = array();
    for($i = 0; $i < $n; $i++){
        $F[$i][$i] = ($symbols[$i] == 'F') ? 1 : 0;
        $T[$i][$i] = ($symbols[$i] == 'T') ? 1 : 0;
    }
    for($gap = 1; $gap < $n; $gap++){
        for($i = 0, $j = $gap; $j < $n; $i++, $j++){
            $T[$i][$j] = $F[$i][$j] = 0;
            for($g = 0; $g < $gap; $g++){
                $k = $i + $g;
                $tik = $T[$i][$k] + $F[$i][$k];
                $tkj = $T[$k + 1][$j] + $F[$k + 1][$j];
                if($operators[$k] == '&'){
                    $T[$i][$j] += $T[$i][$k] * $T[$k + 1][$j];
                    $F[$i][$j] += ($tik * $tkj - $T[$i][$k] * $T[$k + 1][$j]);
                }
                if ($operators[$k] == '|') {
                    $F[$i][$j] += $F[$i][$k] * $F[$k + 1][$j];
                    $T[$i][$j] += ($tik * $tkj - $F[$i][$k] * $F[$k + 1][$j]);
                }
                if ($operators[$k] == '^') {
                    $T[$i][$j] += $F[$i][$k] * $T[$k + 1][$j] + $T[$i][$k] * $F[$k + 1][$j];
                    $F[$i][$j] += $T[$i][$k] * $T[$k + 1][$j] + $F[$i][$k] * $F[$k + 1][$j];
                }
            }
        }
    }
    return $T[0][$n - 1];
}

$symbols = "TTFT";
$operators = "|&^";
$n = strlen($symbols);
echo countParenth($symbols, $operators, $n);