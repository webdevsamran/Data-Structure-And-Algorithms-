<?php

function missingElements($arr, $low, $high)
{
    $temp = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        if (!array_key_exists($arr[$i], $temp)) {
            $temp[$arr[$i]] = 0;
        }
        $temp[$arr[$i]]++;
    }
    echo "Missing Elements are: ";
    for ($i = $low; $i <= $high; $i++) {
        if (!array_key_exists($i, $temp)) {
            echo $i . " ";
        }
    }
    echo "<br/>";
}

$arr = [1, 3, 4, 5];
$low = 0;
$high = 10;
missingElements($arr, $low, $high);
