<?php

function isPalindrome($str,$L,$R){
    while ($R > $L)
        if ($str[$L++] != $str[$R--])
            return false;
    return true;
}

$str = "abaaabaaaba";
$str = str_split($str);
$queries = [ [ 0, 10 ], [ 5, 8 ], [ 2, 5 ], [ 5, 9 ] ];
foreach ($queries as $q) {
    $result = isPalindrome($str, $q[0], $q[1]);
    if ($result)
        echo "The substring [" . $q[0] . "," . $q[1] . "] is a palindrome.<br/>";
    else
        echo "The substring [" . $q[0] . "," . $q[1] . "] is not palindrome.<br/>";
}