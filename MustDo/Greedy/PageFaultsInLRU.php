<?php

function pageFaults($n,$c,$pages){
    $count = 0;
    $v = array();
    for($i = 0; $i < $n; $i++){
        $res = in_array($pages[$i],$v);
        if(!$res){
            if(sizeof($v) == $c){
                unset($v[array_key_first($v)]);
                $count--;
                // $v = array_values($v);
            }
            array_push($v,$pages[$i]);
            $count++;
        }else{
            unset($v[(int)(array_keys($v,$pages[$i]))]);
            array_push($v,$pages[$i]);
            $count++;
        }
    }
    return $count;
}

$pages = [ 1, 2, 1, 4, 2, 3, 5 ];
$n = 7;
$c = 3;
echo "Page Faults = " . pageFaults($n, $c, $pages);