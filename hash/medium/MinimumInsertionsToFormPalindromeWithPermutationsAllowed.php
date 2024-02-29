<?php

function minInsertion($str){
    $len = strlen($str);
    $res = 0;
    $map = array();

    for($i = 0; $i < $len; $i++){
        if(!array_key_exists($str[$i],$map)){
            $map[$str[$i]] = 0;
        }
        $map[$str[$i]]++;
    }

    foreach($map as $key => $val){
        if($val % 2 == 1){
            $res++;
        }
    }
    return ($res == 0) ? 0 : $res - 1;
}

$str = "geeksforgeeks";
echo minInsertion($str);