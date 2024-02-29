<?php

function longestCommonPrefix($input,$n){
    if($n == 0){
        return "";
    }
    if($n == 1){
        return $input[0];
    }
    sort($input);
    $en = min(strlen($input[0]),strlen($input[$n-1]));
    $first = $input[0];
    $last = $input[$n-1];
    $i = 0;
    while($i < $en && $first[$i] == $last[$i]){
        $i++;
    }
    $pre = substr($first,0,$i);
    return $pre;
}

$input = [ "geeksforgeeks", "geeks", "geek", "geezer" ];
$n = sizeof($input);
echo "The longest Common Prefix is : " . longestCommonPrefix($input, $n);