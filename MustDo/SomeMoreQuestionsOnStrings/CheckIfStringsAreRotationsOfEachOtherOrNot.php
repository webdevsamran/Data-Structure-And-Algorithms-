<?php

// function areRotations($str1, $str2){
//     if(strlen($str1) != strlen($str2)){
//         return false;
//     }
//     $temp = $str1 . $str1;
//     return str_contains($temp,$str2);
// }

function areRotations($str1, $str2){
    if(strlen($str1) != strlen($str2)){
        return false;
    }
    $q1 = new SplQueue;
    $q2 = new SplQueue;
    for($i = 0; $i < strlen($str1); $i++){
        $q1->enqueue($str1[$i]);
    }
    for($i = 0; $i < strlen($str2); $i++){
        $q2->enqueue($str2[$i]);
    }
    $k = strlen($str2);
    while($k--){
        $ch = $q2->dequeue();
        $q2->enqueue($ch);
        if($q1 == $q2){
            return true;
        }
    }
    return false;
}

$str1 = "AACD";
$str2 = "ACDA";
if (areRotations($str1, $str2))
    printf("Strings are rotations of each other");
else
    printf("Strings are not rotations of each other");