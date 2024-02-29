<?php

function printFrequency(string $str): void
{
    $str = strtolower($str);
    $temp = array();
    for ($i = 97; $i < 123; $i++) {
        $temp[chr($i)] = 0;
    }
    for ($i = 0; $i < strlen($str); $i++) {
        $temp[$str[$i]]++;
    }
    foreach ($temp as $key => $val) {
        if ($val == 0) {
            continue;
        }
        echo $key . $val . " ";
    }
}

$str = "Samran";
printFrequency($str);
