<?php

function findFrequency($arr,$n,$left,$right,$element){
    $count = 0;
    for ($i = $left - 1; $i < $right; ++$i)
        if ($arr[$i] == $element)
            ++$count;
    return $count;
}

$arr = [2, 8, 6, 9, 8, 6, 8, 2, 11];
$n = sizeof($arr);

echo "Frequency of 2 from 1 to 6 = " . findFrequency($arr, $n, 1, 6, 2) ."<br/>";
echo "Frequency of 8 from 4 to 9 = " . findFrequency($arr, $n, 4, 9, 8) ."<br/>";