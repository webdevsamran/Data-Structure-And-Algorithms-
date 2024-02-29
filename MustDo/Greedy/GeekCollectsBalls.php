<?php

function maxBalls($n,$m,$a,$b){
    sort($a);
    sort($b);
    $i = $j = $s1 = $s2 = 0;
    while($i < $n || $j < $m){
        if($i < $n && $j < $m){
            if($a[$i] < $b[$j]){
                $s1 += $a[$i];
                $i++;
            }else if($a[$i] > $b[$j]){
                $s2 += $b[$j];
                $j++;
            }else{
                $x = $a[$i];
                $c1 = $c2 = 0;
                while($a[$i++] == $x){
                    $c1++;
                }
                while($b[$j++] == $x){
                    $c2++;
                }
                $i--;
                $j--;
                if($s1 > $s2){
                    $s2 = $s1 + ($c1 + $c2 - 1) * $x;
                    if($c1 > 1){
                        $s1 += ($c1 + $c2 - 2) * $x;
                    }else{
                        $s1 += $x;
                    }
                }else{
                    $s1 = $s2 + ($c1 + $c2 - 1) * $x;
                    if($c2 > 1){
                        $s2 += ($c1 + $c2 - 2) * $x;
                    }else{
                        $s2 += $x;
                    }
                }
            }
        }else if($i < $n){
            $s1 += $a[$i];
            $i++;
        }else if($j < $m){
            $s2 += $b[$j];
            $j++;
        }
    }
    return max($s1,$s2);
}

$N = 5;
$M = 5;
$a = [1, 4, 5, 6, 8];
$b = [2, 3, 4, 6, 9];

echo maxBalls($N,$M,$a,$b);