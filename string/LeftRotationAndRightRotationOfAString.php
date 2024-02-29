<?php

function leftRotation(string $str, int $d): void
{
    $len = strlen($str);
    $temp_str = array();
    $k = 0;
    for ($i = $d; $i < $len; $i++) {
        $temp_str[$k] = $str[$i];
        $k++;
    }
    for ($i = 0; $i < $d; $i++) {
        $temp_str[$k] = $str[$i];
        $k++;
    }
    $i = 0;
    foreach ($temp_str as $val) {
        $str[$i] = $val;
        $i++;
    }
    echo $str;
}

function rightRotation(string $str, int $d): void
{
    $len = strlen($str);
    $temp_str = array();
    $starts_from = $len - $d;
    $k = 0;
    for ($i = $starts_from; $i < $len; $i++) {
        $temp_str[$k] = $str[$i];
        $k++;
    }
    for ($i = 0; $i < $starts_from; $i++) {
        $temp_str[$k] = $str[$i];
        $k++;
    }
    $i = 0;
    foreach ($temp_str as $val) {
        $str[$i] = $val;
        $i++;
    }
    echo $str;
}

$str = "Samran";
$d = 2;
leftRotation($str, 2);
rightRotation($str, 2);
