<?php

function findiThIndexElement($num, $iteration, $index): int
{
    $binary_num = base_convert($num, 10, 2);
    echo $binary_num . "<br/>";
    $str = '';
    for ($i = 0; $i < $iteration; $i++) {
        for ($j = 0; $j < strlen($binary_num); $j++) {
            if ($binary_num[$j] == '0') {
                $str .= '01';
            } else {
                $str .= '10';
            }
        }
        echo $str . "<br/>";
        $binary_num = $str;
        $str = '';
    }
    return $binary_num[$index];
}

$num = 5;
$iteration = 2;
$index = 7;
echo findiThIndexElement($num, $iteration, $index);
