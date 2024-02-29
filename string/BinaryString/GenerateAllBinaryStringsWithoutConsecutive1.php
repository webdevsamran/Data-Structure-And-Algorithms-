<?php

function generateBinaryString(int $size, array $str, int $index): void
{
    if ($size == $index) {
        $str = implode('', $str);
        echo $str;
        echo "<br/>";
        return;
    }
    if ($str[$index - 1] == '1') {
        $str[$index] = '0';
        generateBinaryString($size, $str, $index + 1);
    }
    if ($str[$index - 1] == '0') {
        $str[$index] = '0';
        generateBinaryString($size, $str, $index + 1);
        $str[$index] = '1';
        generateBinaryString($size, $str, $index + 1);
    }
}

function generateBinaryStrings(int $size): void
{
    if ($size <= 0) {
        return;
    }
    $str[0] = 0;
    generateBinaryString($size, $str, 1);
    $str[0] = 1;
    generateBinaryString($size, $str, 1);
}

$size = 3;
generateBinaryStrings($size);
