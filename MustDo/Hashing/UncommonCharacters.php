<?php

function findAndPrintUncommonChars($str1, $str2){
    $present = array();
    $l1 = strlen($str1);
    $l2 = strlen($str2);
    for($i = 0; $i < $l1; $i++){
        $present[$str1[$i]] = 1;
    }
    for($i = 0; $i < $l2; $i++){
        if($present[$str2[$i]] == 1 || $present[$str2[$i]] == -1){
            $present[$str2[$i]] = -1;
        }else{
            $present[$str2[$i]] = 2;
        }
    }
    foreach($present as $el => $freq){
        if($freq != -1){
            echo $el . " ";
        }
    }
}

$str1 = "characters";
$str2 = "alphabets";
findAndPrintUncommonChars($str1, $str2);