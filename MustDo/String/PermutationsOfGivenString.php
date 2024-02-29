<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function recPerm($index, $s, &$set){
    if($index == sizeof($s)){
        array_push($set,$s);
        return;
    }
    for($i = $index; $i < sizeof($s); $i++){
        swap($s[$index], $s[$i]);
        recPerm($index + 1, $s, $set);
        swap($s[$index], $s[$i]);
    }
}

function find_permutation($s){
    $ans = $set = array();
    recPerm(0,str_split($s),$set);
    foreach($set as $it){
        array_push($ans, $it);
    }
    return $ans;
}

$s = "ABC";
echo "<pre>";
print_r(find_permutation($s));