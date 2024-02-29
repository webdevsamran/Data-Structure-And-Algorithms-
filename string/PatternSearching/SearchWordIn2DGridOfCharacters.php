<?php

$xMove = [-1,-1,-1,0,0,1,1,1];
$yMove = [-1,0,1,-1,1,-1,0,1];

function search2D($grid,$i,$j,$word,$row,$col){
    global $xMove;
    global $yMove;

    if($grid[$i][$j] != $word[0]){
        return false;
    }

    $len = strlen($word);

    for($dir = 0; $dir < 8; $dir++){
        $rD = $i + $xMove[$dir];
        $cD = $j + $yMove[$dir];

        for($k = 1; $k < $len; $k++){
            if($rD >= $row || $rD < 0 || $cD >= $col || $cD < 0){
                break;
            }
            if($grid[$rD][$cD] != $word[$k]){
                break;
            }
            $rD += $xMove[$dir];
            $cD += $yMove[$dir];
        }

        if($k == $len){
            return true;
        }
    }
    return false;
}

function patternSearch($grid,$word,$row,$col){
    for($i = 0; $i < $row; $i++){
        for($j = 0; $j < $col; $j++){
            if(search2D($grid,$i,$j,$word,$row,$col)){
                echo "Pattern Found At ".$i.",".$j.".<br/>";
            }
        }
    }
}

$R = 3;
$C = 13;
$grid = [ 
    "GEEKSFORGEEKS",
    "GEEKSQUIZGEEK",
    "IDEQAPRACTICE"
];
 
patternSearch($grid, "GEEKS", $R, $C);
echo "<br/>";
patternSearch($grid, "EEE", $R, $C);