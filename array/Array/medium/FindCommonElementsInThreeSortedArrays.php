<?php

// function findCommon($ar1,$ar2,$ar3,$m,$n,$o){
//     for($i = 0; $i < $o; $i++){
//         if(in_array($ar3[$i],$ar1) && in_array($ar3[$i],$ar2)){
//             echo $ar3[$i] . " ";
//         }
//     }
// }

function findCommon($arr1,$arr2,$arr3,$n1,$n2,$n3){
    $i = $j = $k = 0;
    while($i < $n1 && $j < $n2 && $k < $n3){
        if($arr1[$i] == $arr2[$j] && $arr1[$i] == $arr3[$k]){
            echo $arr1[$i] . " ";
            $i++;
            $j++;
            $k++;
        }else if($arr1[$i] < $arr2[$j]){
            $i++;
        }else if($arr2[$j] < $arr3[$k]){
            $j++;
        }else{
            $k++;
        }
    }
}

$ar1 = [ 1, 5, 10, 20, 40, 80 ];
$ar2 = [ 6, 7, 20, 80, 100 ];
$ar3 = [ 3, 4, 15, 20, 30, 70, 80, 120 ];
$n1 = sizeof($ar1);
$n2 = sizeof($ar2);
$n3 = sizeof($ar3);

echo "Common Elements are :";
findCommon($ar1, $ar2, $ar3, $n1, $n2, $n3);