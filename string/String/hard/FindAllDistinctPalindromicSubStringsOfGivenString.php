<?php

function solve($str){
    $n = strlen($str);
    $str = str_split($str);
    $dp = array_fill(0,$n,array_fill(0,$n,0));
    for($i = 0; $i < $n; $i++){
        $dp[$i][$i] = 1;
        if($i < $n && $str[$i] == $str[$i+1]){
            $dp[$i][$i+1] = 1;
        }
    }
    for($len = 3; $len <= $n; $len++){
        for($i = 0; $i + $len - 1 < $n; $i++){
            if($str[$i] == $str[($i + $len - 1)] && $dp[$i+1][($i + $len - 1)]){
                $dp[$i][$i + ($len - 1)] = true;
            }
        }
    }
    $kmp = array_fill(0,$n,0);
    for($i = 0; $i < $n; $i++){
        $j = 0;
        $k = 1;
        while($k + $i < $n){
            if($str[$j+$i] == $str[$k+$i]){
                $dp[$k - $i + $j][$k + $i] = false;
                $kmp[$k++] = ++$j;
            }else if($j > 0){
                $j = $kmp[$j - 1];
            }else{
                $kmp[$k++] = 0;
            }
        }
    }
    $count = 0;
    for ($i = 0; $i < $n; $i++) {
        $n_str = '';
        for ($j = $i; $j < $n; $j++) {
            $n_str .= $str[$j];
            if ($dp[$i][$j]) {
                $count++;
                echo $n_str . '<br/>';
            }
        }
    }
    echo "Total number of distinct palindromes is " . $count;
}

$s1 = "abaaa";
$s2 = "aaaaaaaaaa";
solve($s1);
solve($s2);