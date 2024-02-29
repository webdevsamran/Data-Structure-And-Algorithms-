<?php

function PrintMatchingCamelCase($arr, $pattern){
    $map = array();
    for($i = 0; $i < sizeof($arr); $i++){
        $str = '';
        $l = strlen($arr[$i]);
        for($j = 0; $j < $l; $j++){
            if($arr[$i][$j] >= 'A' && $arr[$i][$j] <= 'Z'){
                $str .= $arr[$i][$j];
                $map[$str][] = $arr[$i];
            }
        }
    }
    $wordFound = false;
    foreach($map as $key => $words){
        if($key == $pattern){
            $wordFound = true;
            foreach($words as $word){
                echo $word . "<br/>";
            }
        }
    }
}

$arr = [ "Hi", "Hello", "HelloWorld", "HiTech", "HiGeek", "HiTechWorld", "HiTechCity", "HiTechLab" ];
$pattern = "HT";
PrintMatchingCamelCase($arr, $pattern);