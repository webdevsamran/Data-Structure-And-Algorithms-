<?php

function shortestCommonSuper($str1, $str2, $L1, $L2): int
{
    if (!$L1) {
        return $L2;
    }
    if (!$L2) {
        return $L1;
    }
    if ($str1[$L1 - 1] == $str2[$L2 - 1]) {
        return 1 + shortestCommonSuper($str1, $str2, $L1 - 1, $L2 - 1);
    }
    return 1 + min(shortestCommonSuper($str1, $str2, $L1 - 1, $L2), shortestCommonSuper($str1, $str2, $L1, $L2 - 1));
}

$str1 = "AGGTAB";
$str2 = "GXTXAYB";
echo shortestCommonSuper($str1, $str2, strlen($str1), strlen($str2));
