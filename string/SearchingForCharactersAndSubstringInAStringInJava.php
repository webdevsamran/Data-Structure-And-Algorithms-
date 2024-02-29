<?php

function indexOf(string $str, $c): int
{
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        if ($str[$i] == $c) {
            return $i;
        }
    }
    return -1;
}

function lastIndexOf(string $str, $c): int
{
    $len = strlen($str);
    for ($i = $len - 1; $i >= 0; $i--) {
        if ($str[$i] == $c) {
            return $i;
        }
    }
    return -1;
}

function charAt(string $str, int $index_number): string
{
    return $str[$index_number];
}

function containSubstr(string $str, string $substr): void
{
    $len = strlen($str);
    $len_sub = strlen($substr);
    for ($i = 0; $i < $len - $len_sub; $i++) {
        $new_str = '';
        for ($j = 0; $j < $len_sub; $j++) {
            $new_str .= $str[$i + $j];
        }
        if ($substr == $new_str) {
            echo "Substring Present in the String and present at index " . $i . "<br/>";
        }
    }
}

$str = "My Name is Samran";
echo indexOf($str, "a") . ", ";
echo lastIndexOf($str, "a") . ", ";
echo charAt($str, 4) . ", ";
echo "<br/>";
containSubstr($str, "is");
