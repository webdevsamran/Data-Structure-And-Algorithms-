<?php

function minFlipsToMakeAllSame(string $str): int
{
    $min_flips = 0;
    $last = '';
    for ($i = 0; $i < strlen($str) - 1; $i++) {
        if ($str[$i] != $last) {
            $min_flips++;
        }
        $last = $str[$i];
    }
    return $min_flips / 2;
}

$str = "010101100011";
echo minFlipsToMakeAllSame($str);
