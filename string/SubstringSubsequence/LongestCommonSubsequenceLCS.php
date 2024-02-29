<?php

function lcs(string $str1, string $str2, int $l1, int $l2): int
{
    if ($l1 == 0 || $l2 == 0) {
        return 0;
    }
    if ($str1[$l1 - 1] == $str2[$l2 - 1]) {
        return 1 + lcs($str1, $str2, $l1 - 1, $l2 - 1);
    } else {
        return max(lcs($str1, $str2, $l1, $l2 - 1), lcs($str1, $str2, $l1 - 1, $l2));
    }
}

$str1 = "AGGTAB";
$str2 = "GXTXAYB";
$l1 = strlen($str1);
$l2 = strlen($str2);

echo lcs($str1, $str2, $l1, $l2);
