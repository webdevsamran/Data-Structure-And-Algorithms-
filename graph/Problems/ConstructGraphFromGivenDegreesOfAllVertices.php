<?php

function printMat($degseq,$n){
    $mat = array_fill(0,$n,array_fill(0,$n,0));
    for($i = 0; $i < $n; $i++){
        for($j = $i+1; $j < $n; $j++){
            if($degseq[$i] > 0 && $degseq[$j] > 0){
                $degseq[$i]--;
                $degseq[$j]--;
                $mat[$i][$j] = 1;
                $mat[$j][$i] = 1;
            }
        }
    }
    echo "<br/>";
    for($i = 0; $i < $n; $i++){
        echo " (" . $i . ") ";
    }
    echo "<br/>";
    for($i = 0; $i < $n; $i++){
        echo " (" . $i . ") ";
        for($j = 0; $j < $n; $j++){
            echo $mat[$i][$j] . " ";
        }
        echo "<br/>";
    }
}

$degseq = [ 2, 2, 1, 1, 1 ];
$n = sizeof($degseq);
printMat($degseq, $n);