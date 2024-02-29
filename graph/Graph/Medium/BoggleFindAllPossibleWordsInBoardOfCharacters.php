<?php

define('SIZE',3);

$dictionary = [ "GEEKS", "FOR", "QUIZ", "GO" ];
$n = sizeof($dictionary);

function isWord($str){
    global $dictionary;
    global $n;
    for($i = 0; $i < $n; $i++){
        if($str == $dictionary[$i]){
            return true;
        }
    }
    return false;
}

function findWordsUtil($boggle,&$visited,$i,$j,&$str){
    $visited[$i][$j] = true;
    $str .= $boggle[$i][$j];
    if(isWord($str)){
        echo $str . "<br/>";
    }
    for($row = $i - 1; $row <= $i + 1 && $row < SIZE; $row++){
        for($col = $j - 1; $col <= $j + 1 && $col < SIZE; $col++){
            if($row >= 0 && $col >= 0 && !$visited[$row][$col]){
                findWordsUtil($boggle,$visited,$row,$col,$str);
            }
        }
    }
    $str = substr($str,0,-1);
    $visited[$i][$j] = false;
}

function findWords($boggle){
    $visited = array_fill(0,SIZE,array_fill(0,SIZE,0));
    $str = '';
    for($i = 0; $i < SIZE; $i++){
        for($j = 0; $j < SIZE; $j++){
            findWordsUtil($boggle, $visited, $i, $j, $str);
        }
    }
}

$boggle = [ 
    [ 'G', 'I', 'Z' ],
    [ 'U', 'E', 'K' ],
    [ 'Q', 'S', 'E' ] 
];
echo "Following words of dictionary are present: <br/>";
findWords($boggle);