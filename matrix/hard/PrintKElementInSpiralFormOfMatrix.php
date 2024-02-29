<?php

define('R',3);
define('C',6);

function spiralPrint($m, $n, $a, $c){
    $l = $k = $count = 0;
    while($l < $n && $k < $m){
        for ($i = $l; $i < $n; ++$i) {
            $count++;
            if ($count == $c)
                echo $a[$k][$i] . " ";
        }
        $k++;
        for ($i = $k; $i < $m; ++$i) {
            $count++;
            if ($count == $c)
                echo $a[$i][$n - 1] . " ";
        }
        $n--;
        if ($k < $m) {
            for ($i = $n - 1; $i >= $l; --$i) {
                $count++;
                if ($count == $c)
                    echo $a[$m - 1][$i] . " ";
            }
            $m--;
        }
        if ($l < $n) {
            for ($i = $m - 1; $i >= $k; --$i) {
                $count++;
                if ($count == $c)
                    echo $a[$i][$l] . " ";
            }
            $l++;
        }
    }
}

$a = [ 
    [ 1, 2, 3, 4, 5, 6 ],
    [ 7, 8, 9, 10, 11, 12 ],
    [ 13, 14, 15, 16, 17, 18 ]
];
$k = 18; 
spiralPrint(R, C, $a, $k);