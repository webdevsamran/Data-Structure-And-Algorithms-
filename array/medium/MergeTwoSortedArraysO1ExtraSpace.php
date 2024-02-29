<?php

function merging(array &$arr1, array &$arr2): void
{
    $m = sizeof($arr1);
    $n = sizeof($arr2);
    for ($i = $n - 1; $i >= 0; $i--) {
        $last = $arr1[$m - 1];
        for ($j = $m - 2; $j >= 0 && $arr1[$j] > $arr2[$i]; $j--) {
            $arr1[$j + 1] = $arr1[$j];
        }
        if ($last > $arr2[$i]) {
            $arr1[$j + 1] = $arr2[$i];
            $arr2[$i] = $last;
        }
    }
}

$arr1 = [1, 5, 9, 10, 15, 20];
$arr2 = [2, 3, 8, 13];
merging($arr1, $arr2);
print_r($arr1);
echo "<br/>";
print_r($arr2);
