<?php

function multiply($x,&$res,$res_size){
    $carry = 0;
    for($i = 0; $i < sizeof($res); $i++){
        $prod = (int)($res[$i] * $x + $carry);
        $res[$i] = $prod % 10;
        $carry = (int)($prod / 10);
    }
    while($carry){
        $res[$res_size] = $carry % 10;
        $carry = (int)($carry / 10);
        $res_size++;
    }
    return $res_size;
}

function factorial($n){
    $res = array();
    $res[0] = 1;
    $res_size = 1;
    for($x = 2; $x <= $n; $x++){
        $res_size = multiply($x,$res,$res_size);
    }
    echo "Factorial of given number is <br/>";
    for ($i = $res_size - 1; $i >= 0; $i--)
        echo $res[$i];
}

factorial(100);