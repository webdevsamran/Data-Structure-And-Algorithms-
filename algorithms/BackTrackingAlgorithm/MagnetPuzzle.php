<?php

function checkConstraints(&$rules){
    $M = 5;
    $N = 6;
    $top = [ 1, -1, -1, 2, 1, -1 ];
	$bottom = [2, -1, -1, 2, -1, 3 ];
	$left = [2, 3, -1, -1, -1];
	$right = [-1, -1, -1, 1, -1];
    $pCountH = array_fill(0,sizeof($rules),0);
    $nCountH = array_fill(0,sizeof($rules),0);
    for($row = 0; $row < sizeof($rules); $row++){
        for($col = 0; $col < sizeof($rules[0]); $col++){
            $ch = $rules[$row][$col];
            if($ch == '+'){
                $pCountH[$row] += 1;
            }else if($ch == '-'){
                $nCountH[$row] += 1;
            }
        }
    }
    $pCountV = array_fill(0,sizeof($rules[0]),0);
    $nCountV = array_fill(0,sizeof($rules[0]),0);
    for($col = 0; $col < sizeof($rules[0]); $col++){
        for($row = 0; $row < sizeof($rules); $row++){
            $ch = $rules[$row][$col];
            if($ch == '+'){
                $pCountV[$col] += 1;
            }else if($ch == '-'){
                $nCountV[$col] += 1;
            }
        }
    }
    for($row = 0; $row < sizeof($rules); $row++){
        if($left[$row] != -1){
            if($pCountH[$row] != $left[$row]){
                return false;
            }
        }
        if($right[$row] != -1){
            if($nCountH[$row] != $right[$row]){
                return false;
            }
        }
    }
    for($col = 0; $col < sizeof($rules); $col++){
        if($top[$col] != -1){
            if($pCountV[$col] != $top[$col]){
                return false;
            }
        }
        if($bottom[$col] != -1){
            if($nCountV[$col] != $bottom[$col]){
                return false;
            }
        }
    }
    return true;
}

function canPutPatternHorizontally(&$rules,$i,$j,$pat){
    if($j - 1 >= 0 && $rules[$i][$j-1] == $pat[0]){
        return false;
    }else if($i - 1 >= 0 && $rules[$i-1][$j] == $pat[0]){
        return false;
    }else if($i - 1 >= 0 && $rules[$i-1][$j+1] == $pat[1]){
        return false;
    }else if($j+2 < sizeof($rules[0]) && $rules[$i][$j+2] == $pat[1]){
        return false;
    }
    return true;
}

function canPutPatternVertically(&$rules,$i,$j,$pat){
    if($j - 1 >= 0 && $rules[$i][$j-1] == $pat[0]){
        return false;
    }else if($i - 1 >= 0 && $rules[$i-1][$j] == $pat[0]){
        return false;
    }else if($j+1 < sizeof($rules[0]) && $rules[$i][$j+1] == $pat[0]){
        return false;
    }
    return true;
}

function solveMagnets(&$rules,$i,$j){
    if($i == sizeof($rules) && $j == 0){
        if(checkConstraints($rules)){
            echo "[";
            for($indxi = 0; $indxi < sizeof($rules); $indxi++){
                echo "[";
                for($indxj = 0; $indxj < sizeof($rules[0]); $indxj++){
                    echo "'" . $rules[$indxi][$indxj] . "', ";
                }
                echo "]<br/>";
            }
            echo "]<br/>";
        }
    }else if($j >= sizeof($rules[0])){
        solveMagnets($rules,$i+1,0);
    }else{
        if($rules[$i][$j] == 'L'){
            if(canPutPatternHorizontally($rules,$i,$j,'+-')){
                $rules[$i][$j] = '+';
                $rules[$i][$j+1] = '-';
                solveMagnets($rules,$i,$j+2);
                $rules[$i][$j] = 'L';
                $rules[$i][$j+1] = 'R';
            }
            if(canPutPatternHorizontally($rules,$i,$j,'-+')){
                $rules[$i][$j] = '-';
                $rules[$i][$j+1] = '+';
                solveMagnets($rules,$i,$j+2);
                $rules[$i][$j] = 'L';
                $rules[$i][$j+1] = 'R';
            }
            if((1 == 1) || canPutPatternHorizontally($rules,$i,$j,'xx')){
                $rules[$i][$j] = 'x';
                $rules[$i][$j+1] = 'x';
                solveMagnets($rules,$i,$j+2);
                $rules[$i][$j] = 'L';
                $rules[$i][$j+1] = 'R';
            }
        }else if($rules[$i][$j] == 'T'){
            if(canPutPatternVertically($rules,$i,$j,'+-')){
                $rules[$i][$j] = '+';
                $rules[$i+1][$j] = '-';
                solveMagnets($rules,$i,$j+1);
                $rules[$i][$j] = 'T';
                $rules[$i+1][$j] = 'B';
            }
            if(canPutPatternVertically($rules,$i,$j,'-+')){
                $rules[$i][$j] = '-';
                $rules[$i+1][$j] = '+';
                solveMagnets($rules,$i,$j+1);
                $rules[$i][$j] = 'T';
                $rules[$i+1][$j] = 'B';
            }
            if((1 == 1)|| canPutPatternVertically($rules,$i,$j,'xx')){
                $rules[$i][$j] = 'x';
                $rules[$i+1][$j] = 'x';
                solveMagnets($rules,$i,$j+1);
                $rules[$i][$j] = 'T';
                $rules[$i+1][$j] = 'B';
            }
        }else{
            solveMagnets($rules,$i,$j+1);
        }
    }
}

function doTheStuff(&$rules,$i,$j){
    if($rules[$i][$j] == 'L' || $rules[$i][$j] == 'R'){
        if(canPutPatternHorizontally($rules,$i,$j,'+-')){
            $rules[$i][$j] = '+';
            $rules[$i][$j+1] = '-';
            solveMagnets($rules,$i,$j);
        }
    }
}

$rules = [
    ['L','R','L','R','T','T' ],
    ['L','R','L','R','B','B' ],
    ['T','T','T','T','L','R' ],
    ['B','B','B','B','T','T' ],
    ['L','R','L','R','B','B' ]
];
solveMagnets($rules,0,0);