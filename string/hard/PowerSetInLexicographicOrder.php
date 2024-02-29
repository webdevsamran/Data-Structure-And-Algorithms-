<?php

function func($s,&$str,$n,$p_set){
    for($i = 0; $i < $p_set; $i++){
        $x = NULL;
        for($j = 0; $j < $n; $j++){
            if($i & 1 << $j){
                $x .= $s[$j];
            }
        }
        if($i != 0){
            array_push($str,$x);
        }
    }
}

$s = "cab";
$n = strlen($s);
$str = array();
$pow_set = pow(2, $n);
func($s, $str, $n, $pow_set);
echo "<pre>";
print_r($str);
for ($i = 0; $i < sizeof($str); $i++)
        echo $str[$i] . " ";
echo "<br/>";