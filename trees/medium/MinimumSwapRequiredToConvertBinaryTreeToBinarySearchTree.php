<?php

function inorder($a,&$v,$n,$index){
    if($index >= $n){
        return;
    }
    inorder($a,$v,$n,2*$index+1);
    array_push($v,$a[$index]);
    inorder($a,$v,$n,2*$index+2);
}

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function minSwaps($v){
    $t = array();
    $ans = 0;
    for($i = 0; $i < sizeof($v); $i++){
        $t[$i][0] = $v[$i];
        $t[$i][1] = $i;
    }
    echo "<pre>";
    print_r($t);
    sort($t);
    for($i = 0; $i < sizeof($t); $i++){
        if($i == $t[$i][1]){
            continue;
        }else{
            swap($t[$i][0],$t[$t[$i][1]][0]);
            swap($t[$i][1],$t[$t[$i][1]][1]);
        }
        if($i != $t[$i][1]){
            --$i;
        }
        $ans++;
    }

    return $ans;
}

$a = [ 5, 6, 7, 8, 9, 10, 11 ];
$n = sizeof($a);
$v = array();
inorder($a, $v, $n, 0);
echo minSwaps($v) . "<br/>";