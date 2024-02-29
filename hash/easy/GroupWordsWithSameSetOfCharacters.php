<?php

function getKey($str)
{
    $str = str_split($str);
    sort($str);
    return implode($str);
}

function groupWords($arr)
{
    $temp = array();
    $size = sizeof($arr);
    for ($i = 0; $i < $size; $i++) {
        $key = getKey($arr[$i]);
        $temp[$key][] = $i;
    }
    foreach ($temp as $key => $my_arr) {
        foreach ($my_arr as $val) {
            echo $arr[$val] . ", ";
        }
        echo "<br/>";
    }
}

$arr = ["may", "student", "students", "dog", "studentssess", "god", "cat", "act", "tab", "bat", "flow", "wolf", "lambs", "amy", "yam", "balms", "looped", "poodle"];
groupWords($arr);
