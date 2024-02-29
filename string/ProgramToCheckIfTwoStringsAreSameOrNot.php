<?php

function checkStringsSame(string $str1, string $str2): bool
{
    return $str1 == $str2;
}

$str1 = "Samran";
$str2 = "Samran";
echo checkStringsSame($str1, $str2);
