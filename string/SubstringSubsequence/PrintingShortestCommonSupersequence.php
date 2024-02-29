<?php

function printShortestCommonSuper(string $strX, string $strY): void
{
    $lenX = strlen($strX);
    $lenY = strlen($strY);
    $dp = array();
    for ($i = 0; $i <= $lenX; $i++) {
        for ($j = 0; $j <= $lenY; $j++) {
            if ($i == 0) {
                $dp[$i][$j] = 0;
            } else if ($j == 0) {
                $dp[$i][$j] = 0;
            } else if ($strX[$i - 1] == $strY[$j - 1]) {
                $dp[$i][$j] = 1 + $dp[$i - 1][$j - 1];
            } else {
                $dp[$i][$j] = 1 + min($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }
    $str = '';
    $i = $lenX;
    $j = $lenY;
    while ($i > 0 && $j > 0) {
        if ($strX[$i - 1] == $strY[$j - 1]) {
            $str .= $strX[$i - 1];
            $i--;
            $j--;
        } else if ($dp[$i - 1][$j] > $dp[$i][$j - 1]) {
            $str .= $strY[$j - 1];
            $j--;
        } else {
            $str .= $strX[$i - 1];
            $i--;
        }
    }
    while ($i > 0) {
        $str .= $strX[$i - 1];
        $i--;
    }
    while ($j > 0) {
        $str .= $strY[$j - 1];
        $j--;
    }
    // $str = strrev($str);
    echo $str;
}

$strX = "AGGTAB";
$strY = "GXTXAYB";
printShortestCommonSuper($strX, $strY);
