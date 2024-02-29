<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function preprocessMatrix(&$rows,&$cols,$m,$n){
    for($i = 0; $i < $m; $i++){
        $rows[$i] = $i;
    }
    for($i = 0; $i < $n; $i++){
        $cols[$i] = $i;
    }
}

function queryMatrix(&$rows,&$cols,$m,$n,$type,$x,$y){
    $tmp = NULL;
    switch($type){
        case 'R':
            swap($rows[$x-1],$rows[$y-1]);
            break;
        case 'C':
            swap($cols[$x-1],$cols[$y-1]);
            break;
        case 'P':
            printf("value at (%d, %d) = %d<br/>", $x, $y,$rows[$x-1]*$n + $cols[$y-1]+1);
            break;
    }
    return;
}

$m = 1234;
$n = 5678;
 
// row[] is array for rows and cols[]
// is array for columns
$rows = array();
$cols = array();
 
// Fill initial values in rows[] and cols[]
preprocessMatrix($rows, $cols, $m, $n);

queryMatrix($rows, $cols, $m, $n, 'R', 1, 2);
queryMatrix($rows, $cols, $m, $n, 'P', 1, 1);
queryMatrix($rows, $cols, $m, $n, 'P', 2, 1);
queryMatrix($rows, $cols, $m, $n, 'C', 1, 2);
queryMatrix($rows, $cols, $m, $n, 'P', 1, 1);
queryMatrix($rows, $cols, $m, $n, 'P', 2, 1);