<?php

function concatenateString(string $str1, string $str2, $index = NULL): string
{
    $result_str = '';
    if ($index == NULL) {
        $result_str = $str1 . $str2;
    } else {
        for ($i = 0; $i < strlen($str1); $i++) {
            if ($i == $index) {
                $result_str .= $str2;
            }
            $result_str .= $str1[$i];
        }
    }
    return $result_str;
}

$str1 = "Samran";
$str2 = "Asif";
echo concatenateString($str1, $str2);
echo "<br/>";
echo concatenateString($str1, $str2, 3);
