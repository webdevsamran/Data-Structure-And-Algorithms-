<?php

function maxProfit(array &$arr): void
{
    $size = sizeof($arr);
    $profit = array();
    for ($i = 0; $i < $size; $i++) {
        $profit[$i] = 0;
    }
    $max_profit = $arr[$size - 1];
    for ($i = $size - 2; $i >= 0; $i--) {
        if ($arr[$i] > $max_profit) {
            $max_profit = $arr[$i];
        }
        $profit[$i] = max($profit[$i + 1], $max_profit - $arr[$i]);
    }
    print_r($profit);
    echo "<br/>";
    $min_profit = $arr[0];
    for ($i = 1; $i < $size; $i++) {
        if ($min_profit > $arr[$i]) {
            $min_profit = $arr[$i];
        }
        $profit[$i] = max($profit[$i - 1], $profit[$i] + ($arr[$i] - $min_profit));
    }
    print_r($profit);
    echo "<br/>";
    $result = $profit[$size - 1];
    echo "Max Profit is : " . $result;
}

$arr = [2, 30, 15, 10, 8, 25, 80];
maxProfit($arr);
