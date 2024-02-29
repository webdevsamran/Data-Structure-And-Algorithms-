<?php

function multiply($str1,$str2){
    $len1 = strlen($str1);
    $len2 = strlen($str2);
    if($len1 == 0 || $len2 == 0){
        return 0;
    }
    $result = array_fill(0,$len1+$len2,0);
    $i_n1 = 0;
    $i_n2 = 0;
    for($i = $len1 - 1; $i >= 0; $i--){
        $carry = 0;
        $n1 = $str1[$i];
        $i_n2 = 0;
        for($j = $len2 - 1; $j >= 0; $j--){
            $n2 = $str2[$j];
            $sum = $n1 * $n2 + $result[$i_n1 + $i_n2] + $carry;
            $carry = $sum / 10;
            $result[$i_n1 + $i_n2] = $sum % 10;
            $i_n2++;
        }
        if($carry > 0){
            $result[$i_n1 + $i_n2] += $carry;
        }
        $i_n1++;
    }
    $i = sizeof($result) - 1;
    while($i >= 0 && $result[$i] == 0){
        $i--;
    }
    if($i == -1){
        return 0;
    }
    $s = implode('',$result);
    echo $s;
    return $s;
}

$str1 = "1235421415454545454545454544";
$str2 = "1714546546546545454544548544544545";
echo multiply($str1, $str2);