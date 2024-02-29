<?php

function sortString(array &$str, int $len, int $currentPosition = 0): void
{
    if ($currentPosition == $len) {
        return;
    }
    $next = $currentPosition + 1;
    while ($next < $len) {
        if (ord($str[$next]) < ord($str[$currentPosition])) {
            $temp = $str[$next];
            $str[$next] = $str[$currentPosition];
            $str[$currentPosition] = $temp;
        }
        $next++;
    }
    sortString($str, $len, $currentPosition + 1);
}

$str = str_split(strtolower("Samran"));
sortString($str, sizeof($str), 0);
echo implode('',$str);
