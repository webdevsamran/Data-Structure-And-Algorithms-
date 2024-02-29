<?php

function generateGrey($size): array
{
    if ($size <= 0) {
        return ['0'];
    }
    if ($size == 1) {
        return ['0', '1'];
    }
    $temp = generateGrey($size - 1);
    $arr = array();
    for ($i = 0; $i < sizeof($temp); $i++) {
        $s = $temp[$i];
        array_push($arr, '0' . $s);
    }
    for ($i = sizeof($temp) - 1; $i >= 0; $i--) {
        $s = $temp[$i];
        array_push($arr, '1' . $s);
    }
    return $arr;
}

function generateGreyArr(int $size): void
{
    $arr = generateGrey($size);
    for ($i = 0; $i < sizeof($arr); $i++) {
        echo $arr[$i] . " ";
    }
}

$size = 3;
generateGreyArr($size);
