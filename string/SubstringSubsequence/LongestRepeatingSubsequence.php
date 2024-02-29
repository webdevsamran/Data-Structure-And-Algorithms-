<?php

$dp = array();
function findLongestSubsequence(string $str, array &$dp, int $m, int $n): int
{
    if ($dp[$m][$n] != -1) {
        return $dp[$m][$n];
    }
    if ($m == 0 || $n == 0) {
        return $dp[$m][$n] = 0;
    }
    if ($str[$m - 1] == $str[$n - 1] && $m != $n) {
        return $dp[$m][$n] = findLongestSubsequence($str, $dp, $m - 1, $n - 1) + 1;
    }
    return $dp[$m][$n] = max(findLongestSubsequence($str, $dp, $m, $n - 1), findLongestSubsequence($str, $dp, $m - 1, $n));
}

$str = "aabb";
$len = strlen($str);
for ($i = 0; $i <= $len; $i++) {
    for ($j = 0; $j <= $len; $j++) {
        $dp[$i][$j] = -1;
    }
}
echo findLongestSubsequence($str, $dp, $len, $len);
