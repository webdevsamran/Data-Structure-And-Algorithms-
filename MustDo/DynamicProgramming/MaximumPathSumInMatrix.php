<?php

define('N',4);
define('M',6);

function findMaxPath($mat){
    for($i = 1; $i < N; $i++){
        for($j = 0; $j < M; $j++){
            if($j > 0 && $j < M - 1){
                $mat[$i][$j] += max($mat[$i-1][$j],$mat[$i-1][$j-1],$mat[$i-1][$j+1]);
            }else if($j > 0){
                $mat[$i][$j] += max($mat[$i-1][$j],$mat[$i-1][$j-1]);
            }else if($j < M - 1){
                $mat[$i][$j] += max($mat[$i-1][$j],$mat[$i-1][$j+1]);
            }
        }
    }
    $res = 0;
    for($j = 0; $j < M; $j++){
        $res = max($mat[N-1][$j],$res);
    }
    return $res;
}

$mat1 = [
    [ 10, 10, 2, 0, 20, 4 ],
    [ 1, 0, 0, 30, 2, 5 ],
    [ 0, 10, 4, 0, 2, 0 ],
    [ 1, 0, 2, 20, 0, 4 ]
];
echo findMaxPath($mat1);