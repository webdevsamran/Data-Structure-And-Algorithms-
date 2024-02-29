<?php

function isPalindrome($str): bool
{
    $len = strlen($str);
    $rev_str = '';
    for ($i = $len - 1; $i >= 0; $i--) {
        $rev_str .= $str[$i];
    }
    return $rev_str == $str;
}

$str = "BABABAA";
$count = 0;
$flag = 0;
while (strlen($str) > 0) {
    if (isPalindrome($str)) {
        $flag = 1;
        break;
    } else {
        $count++;
        $str = substr($str, 0, strlen($str) - 1);
    }
}
echo ($flag) ? $count : "Not Possible";
