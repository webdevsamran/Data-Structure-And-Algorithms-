<?php

function insertCharacters(string &$str, array $places): void
{
    $k = 0;
    $new_str = "";
    for ($i = 0; $i < strlen($str); $i++) {
        if ($i == $places[$k] && $k < sizeof($places)) {
            $new_str .= '*';
            $k++;
        }
        $new_str .= $str[$i];
    }
    echo $new_str;
}

$str = "Samran";
$places = [0, 2, 4, 5];
insertCharacters($str, $places);
