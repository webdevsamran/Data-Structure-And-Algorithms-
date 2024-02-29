<?php

function dictionaryContains($word){
    $dictionary = [ "mobile", "samsung", "sam", "sung", "man", "mango", "icecream", "and", "go", "i", "like", "ice", "cream" , ""];
    $n = sizeof($dictionary);
    for($i = 0; $i < $n; $i++){
        if($dictionary[$i] == $word){
            return true;
        }
    }
    return false;
}

function wordBreak($str){
    $n = strlen($str);
    if($n == 0){
        return 0;
    }
    $dp = array_fill(0,$n+1,0);
    $matched_index = array();
    array_push($matched_index,-1);
    for($i = 0; $i < $n; $i++){
        $msize = sizeof($matched_index);
        $f = 0;
        for($j = $msize - 1; $j >= 0; $j--){
            $sb = substr($str,$matched_index[$j] + 1, $i - $matched_index[$j]);
            if(dictionaryContains($sb)){
                $f = 1;
                break;
            }
        }
        if($f == 1){
            $dp[$i] = 1;
            array_push($matched_index,$i);
        }
    }
    return $dp[$n-1];
}

echo wordBreak("ilikesamsung") ? "Yes<br/>" : "No<br/>";
echo wordBreak("iiiiiiii") ? "Yes<br/>": "No<br/>";
echo wordBreak("") ? "Yes<br/>" : "No<br/>";
echo wordBreak("ilikelikeimangoiii") ? "Yes<br/>": "No<br/>";
echo wordBreak("samsungandmango") ? "Yes<br/>": "No<br/>";
echo wordBreak("samsungandmangok") ? "Yes<br/>": "No<br/>";