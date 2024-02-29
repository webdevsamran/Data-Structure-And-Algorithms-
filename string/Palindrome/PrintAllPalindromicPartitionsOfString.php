<?php

$result = array();
$temp = array();

function checkPalindrome($str): bool
{
    $len = strlen($str);
    $rev_str = '';
    for ($i = $len - 1; $i >= 0; $i--) {
        $rev_str .= $str[$i];
    }
    return $rev_str == $str;
}

function palindromicPartitions(array &$result, array &$temp, string $str, int $length, int $index): void
{
    if ($index == $length) {
        array_push($result, $temp);
        return;
    }
    for ($i = $index; $i < $length; $i++) {
        $new_str = substr($str, $index, $i - $index + 1);
        if (checkPalindrome($new_str)) {
            array_push($temp, $new_str);
            palindromicPartitions($result, $temp, $str, $length, $i + 1);
            array_pop($temp);
        }
    }
}

$str = "bcc";
$len = strlen($str);
palindromicPartitions($result, $temp, $str, $len, 0);
echo "<pre>";
print_r($result);
echo "</pre>";
