<?php

function checkbit($array,$index){
    return $array[$index >> 5] & (1 << ($index & 31));
}

function setbit(&$array,$index){
    $a = $array[$index >> 5];
    $b = (1 << ($index & 31));
    $a |= $b;
}

$a = 2;
$b = 10;
$size = abs($b - $a) + 1;
$size = ceil((double)$size/32);
$array = array_fill(0,$size,0);

for ($i = $a; $i <= $b; $i++)
    if ($i % 2 == 0 || $i % 5 == 0)
        setbit($array, $i - $a);

echo "MULTIPLES of 2 and 5:<br/>";
for ($i = $a; $i <= $b; $i++)
    if (checkbit($array, $i - $a))
        echo $i . " ";