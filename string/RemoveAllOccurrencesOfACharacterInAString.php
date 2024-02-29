<?php

function removeOccurence(string $str, $char): string
{
    $new_str = '';
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == $char) {
            continue;
        }
        $new_str .= $str[$i];
    }
    return $new_str;
}

$str = "Samran";
echo removeOccurence($str, "a");
