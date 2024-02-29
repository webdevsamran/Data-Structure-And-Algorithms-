<?php

function longestCommonPrefix($arr,$n){
    if(sizeof($arr) <= 0){
        return "-1";
    }
    $prefix = $arr[0];
    for($i = 1; $i < sizeof($arr); $i++){
        $s = $arr[$i];
        while($s != $prefix){
            if(strlen($prefix) < 0){
                return "-1";
            }
            $s = substr($s,0,strlen($prefix));
            if($prefix == $s){
                continue;
            }else{
                $prefix = substr($prefix,0,strlen($prefix)-1);
            }
        }
    }
    return $prefix;
}

$n = 4;
$arr = [ "geeksforgeeks", "geeks", "geek", "geezer"];

echo longestCommonPrefix($arr,$n);