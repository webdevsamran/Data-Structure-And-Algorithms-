<?php

define('N',4);

function mergeKArrays($arr,$k,&$output){
    for($i = 0; $i < $k; $i++){
        for($j = 0; $j < N; $j++){
            $output[] = $arr[$i][$j];
        }
    }
    sort($output);
}

$arr = [ 
    [ 2, 6, 12, 34 ],
    [ 1, 9, 20, 1000 ],
    [ 23, 34, 90, 2000 ]
];
$K = sizeof($arr);
$output = array();

mergeKArrays($arr, 3, $output);

echo "Merged array is <br/>";
print_r($output);