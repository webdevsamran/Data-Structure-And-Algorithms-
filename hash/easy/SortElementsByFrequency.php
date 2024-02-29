<?php

function sortByFrequency($arr)
{
    $count = array();
    for ($i = 0; $i < sizeof($arr); $i++) {
        if (!array_key_exists($arr[$i], $count)) {
            $count[$arr[$i]] = 0;
        }
        $count[$arr[$i]]++;
    }
    arsort($count);
    $result = array();
    foreach ($count as $key => $val) {
        while ($val) {
            $result[] = $key;
            $val--;
        }
    }
    print_r($result);
    echo "<br/>";
}

$arr = [2, 5, 2, 8, 5, 6, 8, 8];
sortByFrequency($arr);
