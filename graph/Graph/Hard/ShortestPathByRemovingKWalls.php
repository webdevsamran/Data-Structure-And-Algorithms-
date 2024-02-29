<?php

function shortestPath($mat,$k){
    $n = sizeof($mat);
    $m = sizeof($mat[0]);
    if($n == 1 && $m == 1 && (!$mat[0][0] || $k >= 1)){
        return 0;
    }
    $visited = array_fill(0,$n,array_fill(0,$m,array_fill(0,$k+1,0)));
    $queue = new SplQueue;
    $queue->enqueue([0,0,$k]);
    $ar1 = [ 1, -1, 0, 0 ];
    $ar2 = [ 0, 0, -1, 1 ];
    $steps = 0;
    while(!$queue->isEmpty()){
        $size = $queue->count();
        $steps++;
        while($size--){
            $curr = $queue->dequeue();
            $i = $curr[0];
            $j = $curr[1];
            $w = $curr[2];
            $visited[$i][$j][$w] = 1;
            for($dir = 0; $dir < 4; $dir++){
                $new_x = $i + $ar1[$dir];
                $new_y = $j + $ar2[$dir];
                $new_k = $w;
                if($new_x >= 0 && $new_y >= 0 && $new_x < $n && $new_y < $m){
                    if(!$mat[$new_x][$new_y] && !$visited[$new_x][$new_y][$new_k]){
                        if($new_x == $n-1 && $new_y == $m-1){
                            return $steps;
                        }
                        $queue->enqueue([$new_x,$new_y,$new_k]);
                        $visited[$new_x][$new_y][$new_k] = 1;
                    }else if($mat[$new_x][$new_y] && $new_k >= 1 && !$visited[$new_x][$new_y][$new_k-1]){
                        if($new_x == $n-1 && $new_y == $m-1){
                            return $steps;
                        }
                        $queue->enqueue([$new_x,$new_y,$new_k - 1]);
                        $visited[$new_x][$new_y][$new_k - 1] = 1;
                    }
                }
            }
        }
    }
    return -1;
}

$mat = [ [ 0, 0, 0 ], [ 0, 0, 1 ], [ 0, 1, 0 ] ];
$K = 1;
echo shortestPath($mat, $K);