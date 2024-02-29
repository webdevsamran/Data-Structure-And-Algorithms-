<?php

function subsetsUtil(&$A,&$res,&$subset,$index){
    array_push($res,$subset);
    for($i = $index; $i < sizeof($A); $i++){
        array_push($subset,$A[$i]);
        subsetsUtil($A,$res,$subset,$i+1);
        array_pop($subset);
    }
    return;
}

function subsets(&$A){
    $subset = array();
    $res = array();
    $index = 0;
    subsetsUtil($A,$res,$subset,$index);
    return $res;
}

$array = [ 1, 2, 3 ];
$res = subsets($array);

for($i = 0; $i < sizeof($res); $i++) {
    for ($j = 0; $j < sizeof($res[$i]); $j++)
        echo $res[$i][$j] . " ";
    echo "<br/>";
}