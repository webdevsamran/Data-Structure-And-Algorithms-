<?php

function minFlips(string $str): int
{
    $flips = 0;
    for ($i = 0; $i < strlen($str) - 1; $i++) {
        if ($str[$i] == $str[$i + 1]) {
            $flips++;
        }
    }
    return $flips / 2;
}

$str = "0001010111";
echo minFlips($str);
