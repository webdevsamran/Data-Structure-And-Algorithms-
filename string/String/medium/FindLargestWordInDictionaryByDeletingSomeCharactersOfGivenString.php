<?php

$res = '';

function checkW($d,$s){
    global $res;
    $i = $j = 0;
    while($i < strlen($d) && $j < strlen($s)){
        if($d[$i] == $s[$j]){
            $i++;
            $j++;
        }else{
            $j++;
        }
    }
    if($i == strlen($d) && strlen($res) < strlen($d)){
        $res = $d;
    }
}

function LongestWord($dict,$str){
    global $res;
    sort($dict);
    foreach($dict as $word){
        checkW($word,$str);
    }
    return $res;
}

$dict = [ "ale", "apple", "monkey", "plea" ];
$str = "abpcplea";
echo LongestWord($dict, $str);