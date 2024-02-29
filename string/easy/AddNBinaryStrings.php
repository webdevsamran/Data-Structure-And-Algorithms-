<?php

// function addBinaryUtil($a,$b){
//     $result = "";
//     $s = 0;
//     $i = strlen($a) - 1;
//     $j = strlen($b) - 1;

//     while($i >= 0 || $j >= 0 || $s == 1){
//         $s += (($i >= 0) ? $a[$i]-'0': 0);
//         $s += (($j >= 0) ? $b[$j]-'0': 0);
//         $result = (int)($s % 2 + '0') +(int)$result;
//         $s /= 2;
//         $i--;
//         $j--;
//     }

//     return $result;
// }


// function addBinary($arr,$size){
//     $result = '';
//     for($i = 0; $i < $size; $i++){
//         $result = addBinaryUtil($result,$arr[$i]);
//     }
//     return $result;
// }

function addBinary($arr,$size){
    $result = 0;
    for($i = 0; $i < $size; $i++){
        $result += base_convert($arr[$i],2,10);
    }
    return base_convert($result,10,2);
}

$arr = [ "1", "10", "11" ];
$size = sizeof($arr);
echo addBinary($arr, $size);