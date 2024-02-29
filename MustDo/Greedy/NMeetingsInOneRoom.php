<?php

function maxMeetings($s,$f,$n){
    $a = array();
    for($i = 0; $i < $n; $i++){
        $a[$i][0] = $f[$i];
        $a[$i][1] = $i;
    }
    sort($a);
    $time_limit = $a[0][0];
    $m = array();
    array_push($m,$a[0][1] + 1);
    for($i = 1; $i < $n; $i++){
        if($s[$a[$i][1]] > $time_limit){
            array_push($m,$a[$i][1] + 1);
            $time_limit = $a[$i][0];
        }
    }
    for($i = 0; $i < sizeof($m); $i++){
        echo $m[$i] . " ";
    }
}

$s = [ 1, 3, 0, 5, 8, 5 ];
$f = [ 2, 4, 6, 7, 9, 9 ];
$N = sizeof($s);
maxMeetings($s, $f, $N);