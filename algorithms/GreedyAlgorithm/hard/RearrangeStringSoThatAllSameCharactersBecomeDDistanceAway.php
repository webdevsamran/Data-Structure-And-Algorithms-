<?php

function rearrange($str,$d){
    $n = strlen($str);
    $str = str_split($str);
    $map = array();
    for($i = 0; $i < $n; $i++){
        if(!array_key_exists($str[$i],$map)){
            $map[$str[$i]] = 0;
        }
        $map[$str[$i]]++;
    }

    $pq = new SplMaxHeap;
    foreach($map as $key => $freq){
        $pq->insert([$freq,$key]);
    }
    $str = [];
    while(!$pq->isEmpty()){
        $item = $pq->extract();
        $x = $item[0];
        $p = 0;
        while(!empty($str[$p])){
            $p++;
        }
        for ($k = 0; $k < $x; $k++) {
            if (($p + ($d * $k)) > $n) {
                echo "Cannot be rearranged";
                exit(0);
            }
            $str[$p + $d * $k] = $item[1];
        }
        
    }
    ksort($str);
    return implode('',$str);
}

$str = "aabbcc";
echo rearrange($str, 3);