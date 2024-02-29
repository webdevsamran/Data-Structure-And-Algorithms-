<?php

function longDivision($number,$divisor){
    $ans = 0;
    $idx = 0;
    $temp = $number[$idx];

    while($temp < $divisor){
        $temp = (int)$temp * 10 + ((int)$number[++$idx]);
    }

    while(strlen($number) > $idx){
        $ans .= (int)((int)$temp / (int)$divisor);
        $temp = (int)(((int)$temp % (int)$divisor) * 10) + (int)($number[++$idx]);
        echo $ans." -- ".$temp."<br/>";
    }

    if(strlen($ans) == 0){
        return 0;
    }

    return $ans;
}

$number = "1248163264128256512";
$divisor = 125;
echo longDivision($number, $divisor);