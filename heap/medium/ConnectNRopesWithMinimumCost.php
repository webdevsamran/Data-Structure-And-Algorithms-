<?php

function minCost($len,$size){
    $minHeap = new SplMinHeap;
    for($i = 0; $i < $size; $i++){
        $minHeap->insert($len[$i]);
    }
    $res = 0;
    while($minHeap->count() > 1){
        $first = $minHeap->extract();
        $second = $minHeap->extract();
        $res += $first + $second;
        $minHeap->insert($first+$second);
    }
    return $res;
}

$len = [ 4, 3, 2, 6 ];
$size = sizeof($len);
echo "Total cost for connecting ropes is " . minCost($len, $size);