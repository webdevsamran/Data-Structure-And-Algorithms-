<?php

function allSame($freq){
    $same = $freq[array_key_first($freq)];
    foreach($freq as $el => $f){
        if($f != $same){
            return false;
        }
    }
    return true;
}

function possibleSameCharFreqByOneRemoval($str){
    $l = strlen($str);
    $freq = array();
    for($i = 0; $i < $l; $i++){
        $freq[$str[$i]]++;
    }
    if(allSame($freq)){
        return true;
    }
    echo "<pre>";
    print_r($freq);
    foreach($freq as $el => $f){
        if($f > 0){
            $freq[$el]--;
            if(allSame($freq)){
                return true;
            }
            $freq[$el]++;
        }
        if($f > 0){
            $freq[$el]++;
            if(allSame($freq)){
                return true;
            }
            $freq[$el]--;
        }
    }
    return false;
}

$str = "xyyzz";
if (possibleSameCharFreqByOneRemoval($str))
    echo "Yes";
else
    echo "No";