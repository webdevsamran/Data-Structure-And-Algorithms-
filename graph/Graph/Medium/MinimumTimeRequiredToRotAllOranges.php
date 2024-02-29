<?php

define('R',3);
define('C',5);

function isSafe($i,$j){
    return ($i >= 0 && $i < R) && ($j >= 0 && $j < C);
}

function rotOranges($v){
    $changed = false;
    $no = 2;
    while(true){
        for($i = 0; $i < R; $i++){
            for($j = 0; $j < C; $j++){
                if($v[$i][$j] == $no){
                    if(isSafe($i+1,$j) && $v[$i+1][$j] == 1){
                        $v[$i+1][$j] = $v[$i][$j] + 1;
                        $changed = true;
                    }
                    if(isSafe($i,$j+1) && $v[$i][$j+1] == 1){
                        $v[$i][$j+1] = $v[$i][$j] + 1;
                        $changed = true;
                    }
                    if(isSafe($i-1,$j) && $v[$i-1][$j] == 1){
                        $v[$i-1][$j] = $v[$i][$j] + 1;
                        $changed = true;
                    }
                    if(isSafe($i,$j-1) && $v[$i][$j-1] == 1){
                        $v[$i][$j-1] = $v[$i][$j] + 1;
                        $changed = true;
                    }
                }
            }
        }
        if(!$changed){
            break;
        }
        $changed = false;
        $no++;
    }
    for ($i = 0; $i < R; $i++) {
        for ($j = 0; $j < C; $j++) {
            if ($v[$i][$j] == 1)
                return -1;
        }
    }
    return $no - 2;
}

$v = [ 
    [ 2, 1, 0, 2, 1 ],
    [ 1, 0, 1, 2, 1 ],
    [ 1, 0, 0, 2, 1 ] 
];
echo "Max time incurred: " . rotOranges($v);