<?php

function minRemoveElements($arr1, $arr2)
{
    $temp = array();
    for ($i = 0; $i < sizeof($arr1); $i++) {
        if (!array_key_exists($arr1[$i], $temp)) {
            $temp[$arr1[$i]] = 0;
        }
        $temp[$arr1[$i]]++;
    }
    $minCount = 0;
    for ($i = 0; $i < sizeof($arr2); $i++) {
        if (array_key_exists($arr2[$i], $temp)) {
            $minCount++;
            $temp[$arr2[$i]]--;
        } else if (!array_key_exists($arr2[$i], $temp)) {
            $temp[$arr2[$i]] = 1;
        } else {
            $temp[$arr1[$i]]++;
        }
    }
    echo $minCount . " is the Minimum Elements Need to Be Removed.<br/>";
}

$arr1 = [4, 2, 4, 4];
$arr2 = [4, 3];
minRemoveElements($arr1, $arr2);
