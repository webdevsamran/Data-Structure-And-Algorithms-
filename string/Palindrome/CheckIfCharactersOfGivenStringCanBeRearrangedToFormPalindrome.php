<?php

function checkForPalindrome(string $str): bool
{
    $len = strlen($str);
    $count = array();
    for ($i = 97; $i <= 122; $i++) {
        $count[chr($i)] = 0;
    }
    for ($i = 0; $i < $len; $i++) {
        $count[$str[$i]]++;
    }
    $total_odd = 0;
    foreach ($count as $val) {
        if ($val % 2 == 1) {
            $total_odd++;
        }
        if ($total_odd > 1) {
            return false;
        }
    }
    return true;
}

$str1 = "geeksforgeeks";
$str2 = "geeksogeeks";
echo checkForPalindrome($str1);
echo "<br/>";
echo checkForPalindrome($str2);
