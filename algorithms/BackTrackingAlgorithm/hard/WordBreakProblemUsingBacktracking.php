<?php

function dictionaryContains($str){
    $dictionary = ["mobile","samsung","sam","sung", "man","mango", "icecream","and", "go","i","love","ice","cream"];
    return in_array($str,$dictionary);
}

function wordBreakUtil($str,$n,$result){
    for($i = 1; $i <= $n; $i++){
        $prefix = substr($str,0,$i);
        if(dictionaryContains($prefix)){
            if($i == $n){
                $result .= $prefix;
                echo $result . "<br/>";
                return;
            }
            $result .= $prefix . " ";
            wordBreakUtil(substr($str,$i,$n-$i),$n-$i,$result);
        }
    }
}

function wordBreak($str){
    wordBreakUtil($str,strlen($str),"");
}

echo "First Test:<br/>";
wordBreak("iloveicecreamandmango");

echo "<br/>Second Test:<br/>";
wordBreak("ilovesamsungmobile");