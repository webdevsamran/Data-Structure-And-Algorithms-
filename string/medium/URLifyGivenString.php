<?php

function replaceSpaces($string){
    $len = strlen($string);

    $text = "";

    for($i = 0; $i < $len; $i++){
        if($string[$i] == ' '){
            $text .= '%20';
            continue;
        }
        $text .= $string[$i];
    }

    echo $text;
}

$input = "Mr John Smith";
replaceSpaces($input);