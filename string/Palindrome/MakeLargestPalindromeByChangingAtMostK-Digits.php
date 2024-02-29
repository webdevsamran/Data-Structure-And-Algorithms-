<?php

function makeLargestPalindrome(string $str, int $iterations): string
{
    $palindrome = $str;
    $left = 0;
    $right = strlen($str) - 1;
    while ($left < $right) {
        if ($str[$left] != $str[$right]) {
            $palindrome[$left] = max($str[$left], $str[$right]);
            $palindrome[$right] = max($str[$left], $str[$right]);
            $iterations--;
        }
        $left++;
        $right--;
    }
    if ($iterations < 0) {
        return "Not Possible";
    }
    $left = 0;
    $right = strlen($str) - 1;
    while ($left <= $right) {
        if ($left == $right) {
            if ($iterations > 0) {
                $palindrome[$left] = '9';
                $iterations--;
            }
        }
        if ($palindrome[$left] < 9) {
            if ($iterations >= 2 && $palindrome[$left] == $str[$left] && $palindrome[$right] == $str[$right]) {
                $iterations--;
                $iterations--;
                $palindrome[$left] = '9';
                $palindrome[$right] = '9';
            } else if ($iterations >= 1 && ($palindrome[$left] != $str[$left] || $palindrome[$right] != $str[$right])) {
                $iterations--;
                $palindrome[$left] = '9';
                $palindrome[$right] = '9';
            }
        }
        $left++;
        $right--;
    }
    return $palindrome;
}

$str = "43435";
echo makeLargestPalindrome($str, 3);
