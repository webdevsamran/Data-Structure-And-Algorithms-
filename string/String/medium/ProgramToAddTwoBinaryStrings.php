<?php

function addBinary($a,$b){
    if(strlen($a) > strlen($b)){
        return addBinary($b,$a);
    }
    $diff = abs(strlen($a) - strlen($b));
    $str = '0';
    $padding = str_repeat($str,$diff);
    $a = $padding . $a;
    $res = array();
    $carry = '0';
    for($i = strlen($a) - 1; $i >= 0; $i--){
        if($a[$i] == '1' && $b[$i] == '1'){
            if($carry == '1'){
                array_push($res,1);
                $carry = 1;
            }else{
                array_push($res,0);
                $carry = 1;
            }
        }else if($a[$i] == '0' && $b[$i] == '0'){
            if($carry == '1'){
                array_push($res,1);
                $carry = 0;
            }else{
                array_push($res,0);
                $carry = 0;
            }
        }else if($a[$i] != $b[$i]){
            if($carry == '1'){
                array_push($res,0);
                $carry = 1;
            }else{
                array_push($res,1);
                $carry = 0;
            }
        }
    }
    if($carry == '1'){
        array_push($res,$carry);
    }
    $res = array_reverse($res);
    $index = 0;
    while($index + 1 < sizeof($res) && $res[$index] == '0'){
        $index++;
    }
    return substr(implode('',$res),$index);
}

$a = "1101";
$b = "100";
echo addBinary($a, $b);