<?php

function encodeString($pattern){
    $map = array();
    $res = NULL;
    $i = 0;
    $pattern = str_split($pattern);

    foreach($pattern as $char){
        if(!array_key_exists($char,$map)){
            $map[$char] = $i++;
        }
        $res .= $map[$char];
    }

    return $res;
}

function findMatchedWords($dict,$pattern){
    $pLen = strlen($pattern);
    $hash = encodeString($pattern);

    foreach($dict as $word){
        if(encodeString($word) == $hash){
            echo $word." ";
        }
    }
}

$dict = [ "abb", "abc", "xyz", "xyy" ];
$pattern = "foo";

findMatchedWords($dict, $pattern);