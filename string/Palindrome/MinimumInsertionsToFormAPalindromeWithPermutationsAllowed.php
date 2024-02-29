<?php

function minInsertions(string $str): int
{
    $count = array();
    for ($i = 97; $i <= 122; $i++) {
        $count[chr($i)] = 0;
    }
    print_r($count);
    echo "<br/>";
    for ($i = 0; $i < strlen($str); $i++) {
        $count[$str[$i]]++;
    }
    print_r($count);
    echo "<br/>";
    $res = 0;
    foreach ($count as $val) {
        if ($val % 2 == 1) {
            $res++;
        }
    }
    return ($res == 1) ? 0 : $res - 1;
}

$str = "geeksfrgeeks";
echo minInsertions($str);
