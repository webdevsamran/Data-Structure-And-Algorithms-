<?php

function prePrint(array &$arr): void
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function compareFrequency($a, $b)
{
    if ($b["Frequency"] == $a["Frequency"]) {
        return $b["Element"] > $a["Element"];
    }
    return $b["Frequency"] > $a["Frequency"];
}

function mostOccuring(array $arr, $len): void
{
    $size = sizeof($arr);
    $count = array();
    for ($i = 0; $i < $size; $i++) {
        $count[$arr[$i]]++;
    }
    $temp = array();
    foreach ($count as $key => $val) {
        $temp[] = array("Element" => $key, "Frequency" => $val);
    }
    usort($temp, "compareFrequency");
    for ($i = 0; $i < $len; $i++) {
        echo $temp[$i]["Element"] . " ";
    }
    return;
}

$arr = [3, 1, 4, 4, 5, 2, 6, 1];
mostOccuring($arr, 3);
