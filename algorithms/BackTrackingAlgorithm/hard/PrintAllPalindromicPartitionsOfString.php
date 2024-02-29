<?php

function check_palindrome($s, $index, $i)
{
    while ($index <= $i) {
        if ($s[$index++] != $s[$i--])
            return 0;
    }
    return 1;
}

function the_helper(&$result,&$dump,$s,$n,$index){
    if($index == $n){
        array_push($result,$dump);
        return;
    }
    for($i = $index; $i < $n; $i++){
        if(check_palindrome($s,$index,$i)){
            array_push($dump,substr($s,$index,$i-$index+1));
            the_helper($result,$dump,$s,$n,$i+1);
            array_pop($dump);
        }
    }
}

$s = "bcc";
$n = strlen($s);
$result = array();
$dump = array();
the_helper($result, $dump, $s, $n, 0);
echo "All Possible palindromic partitions of a string : <br/><pre>";
print_r($result);