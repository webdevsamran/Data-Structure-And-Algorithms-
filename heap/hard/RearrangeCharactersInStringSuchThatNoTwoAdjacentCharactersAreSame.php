<?php

function rearrangeString($str){
    $len = strlen($str);
    $str = str_split($str);
    $count = array();
    for($i = 0; $i < $len; $i++){
        if(!array_key_exists($str[$i],$count)){
            $count[$str[$i]] = 1;
            continue;
        }
        $count[$str[$i]]++;
    }
    $pq = new SplMaxHeap;
    foreach($count as $key => $val){
        $pq->insert([$val,$key]);
    }
    $str = '';
    $prev = [-1,'#'];
    while(!$pq->isEmpty()){
        $k = $pq->extract();
        $str .= $k[1];
        if($prev[0] > 0){
            $pq->insert($prev);
        }
        $k[0] -= 1;
        $prev = $k;
    }
    if($len != strlen($str)){
        echo "Not Possible.<br/>";
    }else{
        echo $str . "<br/>";
    }
}

$str = "aabbb";
rearrangeString($str);