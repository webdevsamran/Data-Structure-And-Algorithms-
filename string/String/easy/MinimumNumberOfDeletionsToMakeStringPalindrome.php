<?php

function min_ele_del_util($str,$i,$j){
    if($i >= $j){
        return 0;
    }
    if($str[$i] == $str[$j]){
        return min_ele_del_util($str,$i+1,$j-1);
    }
    return 1 + min(min_ele_del_util($str,$i+1,$j),min_ele_del_util($str,$i,$j-1));
}

function min_ele_del($str){
    return min_ele_del_util($str, 0, strlen($str) - 1);
}

$str = "abefbac";
echo "Minimum element of deletions = " . min_ele_del($str);