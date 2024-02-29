<?php

function generateBinaryStrings($str,$index){
    if($index == strlen($str)){
        echo $str."<br/>";
        return;
    }
    if($str[$index] == "?"){
        $str[$index] = '0';
        generateBinaryStrings($str,$index+1);

        $str[$index] = '1';
        generateBinaryStrings($str,$index+1);
    }else{
        generateBinaryStrings($str,$index+1);
    }
}

$str = "1??0?101";
generateBinaryStrings($str, 0);