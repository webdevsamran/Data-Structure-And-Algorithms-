<?php

function min_node($size, $key, $set): int
{
    $min = PHP_INT_MAX;
    $min_index = NULL;
    for ($i = 0; $i < $size; $i++) {
        if ($set[$i] == false && $min > $key[$i]) {
            $min = $key[$i];
            $min_index = $i;
        }
    }
    return $min_index;
}

function findcost($size, $city_arr): void
{
    $parent = array();
    $key = array();
    $set = array();

    for ($i = 0; $i < $size; $i++) {
        $key[$i] = PHP_INT_MAX;
        $set[$i] = false;
    }

    $key[0] = 0;
    $parent[0] = -1;

    for ($i = 0; $i < $size; $i++) {
        $u = min_node($size, $key, $set);
        $set[$u] = true;
        for ($v = 0; $v < $size; $v++) {
            if ($set[$v] == false && $city_arr[$u][$v] && $key[$v] > $city_arr[$u][$v]) {
                $key[$v] = $city_arr[$u][$v];
                $parent[$v] = $u;
            }
        }
    }

    $cost = 0;
    for ($i = 1; $i < $size; $i++) {
        $cost += $city_arr[$parent[$i]][$i];
    }
    echo $cost . "<br/>";
}

$n1 = 5;
$cities = [
    [0, 1, 2, 3, 4],
    [1, 0, 5, 0, 7],
    [2, 5, 0, 6, 0],
    [3, 0, 6, 0, 0],
    [4, 7, 0, 0, 0]
];
findcost($n1, $cities);
