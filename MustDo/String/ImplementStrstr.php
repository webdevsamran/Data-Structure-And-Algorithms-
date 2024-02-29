<?php

function strISstr($s,$x){
    $n1_s = strlen($s);
    $n2_x = strlen($x);
    for($i = 0; $i < $n1_s; $i++){
        if($s[$i] == $x[0]){
            $count = 1;
            while($count < $n2_x && $s[$i + $count] == $x[$count] && $i + $count < $n1_s){
                $count++;
            }
            if($count == $n2_x){
                return $i;
            }
        }
    }
    return -1;
}

$s = "GeeksForGeeks";
$x = "For";

echo strISstr($s,$x);