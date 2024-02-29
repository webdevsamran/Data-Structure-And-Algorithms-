<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function reverse(&$num, $i, $j)
{
    while ($i < $j) {
        swap($num[$i], $num[$j]);
        $i++;
        $j--;
    }
}

function nextPalin($num,$n){
    if($n <= 3){
        echo "Not Possible";
        return;
    }
    $num = str_split($num);
    $mid = (int)($n / 2) - 1;
    for($i = $mid - 1; $i >= 0; $i--){
        if($num[$i] < $num[$i+1]){
            break;
        }
    }
    if($i < 0){
        echo "Not Possible";
        return;
    }
    $smallest = $i + 1;
    for($j = $i + 2; $j <= $mid; $j++){
        if($num[$j] > $num[$i] && $num[$j] <= $num[$smallest]){
            $smallest = $j;
        }
    }
    swap($num[$i],$num[$smallest]);
    swap($num[$n - $i - 1], $num[$n - $smallest - 1]);
    reverse($num, $i + 1, $mid);
    if ($n % 2 == 0)
        reverse($num, $mid + 1, $n - $i - 2);
    else
        reverse($num, $mid + 2, $n - $i - 2);
    echo "Next Palindrome: " . implode('',$num);
}

$num = "4697557964";
$n = strlen($num);
nextPalin($num, $n);