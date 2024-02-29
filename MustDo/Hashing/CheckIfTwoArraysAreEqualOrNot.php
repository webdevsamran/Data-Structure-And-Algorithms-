<?php

function arrays_equal($a,$b){
    $map_a = $map_b = array();
    foreach($a as $val){
        $map_a[$val]++;
    }
    foreach($b as $val){
        $map_b[$val]++;
    }
    return $map_a == $map_b;
}

$a = [3, 2, 1, 3, 2, 1];
$b = [1, 2, 3, 1, 2, 3];
$c = [4, 5, 6, 4, 5, 6];

echo (arrays_equal($a, $b) ? "True" : "False") . "<br/>";
echo (arrays_equal($a, $c) ? "True" : "False") . "<br/>";