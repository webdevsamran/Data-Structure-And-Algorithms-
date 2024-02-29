<?php

function reverseWords($str){
    $tmp = array();
    $new_str = "";
    for($i = 0; $i < strlen($str); $i++){
        if($str[$i] == " "){
            array_push($tmp,$new_str);
            $new_str = "";
        }else{
            $new_str .= $str[$i];
        }
    }
    array_push($tmp,$new_str);
    echo "<pre>";
    print_r($tmp);
    for($i = sizeof($tmp) - 1; $i >= 0; $i--){
        echo $tmp[$i] . " ";
    }
}

$str = "I Love You Very Much";
reverseWords($str);