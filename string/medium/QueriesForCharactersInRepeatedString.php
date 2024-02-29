<?php

function query($string,$start,$end){
    $len = strlen($string);

    $start %= $len;
    $end %= $len;

    echo ($string[$start] == $string[$end]) ? "Yes! Found.<br/>" : "No! Not Found.<br/>";
}

$X = "geeksforgeeks";
 
query($X, 0, 8);
query($X, 8, 13);
query($X, 6, 15);