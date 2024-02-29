<?php

function kth_elem($arr,$query){
    if($query[1] > sizeof($arr)){
        echo "Out of Range!<br/>";
        return;
    }else if(($query[1] - $query[0] + 1) < $query[2]){
        echo "Kth Element is Not Present!<br/>";
        return;
    }else{
        $temp = array();
        for($i = $query[0] - 1; $i < $query[1]; $i++){
            $temp[] = $arr[$i];
        }
        sort($temp);
        print_r($temp);
        echo $temp[$query[2]-1] . "<br/>";
    }
}

$arr = [3, 2, 5, 1, 8, 9];
$query1 = [2, 5, 2];
kth_elem($arr, $query1);
$query2 = [1, 6, 4];
kth_elem($arr, $query2);