<?php

function getDigit($x, &$digitA)
{
    while ($x) {
        array_push($digitA, (int)($x % 10));
        $x /= 10;
    }
}

function digitSum($idx, $sum, $tight, &$digit, &$dp)
{
    if ($idx == -1) {
        return $sum;
    }
    if ($dp[$idx][$sum][$tight] != -1 && $tight != 1) {
        return $dp[$idx][$sum][$tight];
    }
    $ret = 0;
    $k = ($tight) ? $digit[$idx] : 9;
    for ($i = 0; $i <= $k; $i++) {
        $newTight = ($digit[$idx] == $i) ? $tight : 0;
        $ret += digitSum($idx - 1, $sum + $i, $newTight, $digit, $dp);
    }
    if (!$tight) {
        $dp[$idx][$sum][$tight] = $ret;
    }
    return $ret;
}

function rangeDigitSum($a, $b)
{
    $dp = array_fill(0, 20, array_fill(0, 180, array_fill(0, 2, -1)));
    $digitA = array();
    getDigit($a - 1, $digitA);
    $ans1 = digitSum(sizeof($digitA) - 1, 0, 1, $digitA, $dp);
    $digitB = array();
    getDigit($b, $digitB);
    $ans2 = digitSum(sizeof($digitB) - 1, 0, 1, $digitB, $dp);
    return (int)($ans2 - $ans1);
}

$a = 123;
$b = 1024;
echo "Digit Sum For Given Range is : " . rangeDigitSum($a, $b) . "<br/>";
