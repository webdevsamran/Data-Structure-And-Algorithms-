<?php

define('SIZE',3);
$dictionary = [ "GEEKS", "FOR", "QUIZ", "GO" ];

function isWord($str){
    global $dictionary;
    $str = implode('',$str);
    if(in_array($str,$dictionary)){
        return true;
    }
    return false;
}

function findWordsUtil($boggle,&$visited,$i,$j,&$str){
    $visited[$i][$j] = 1;
    array_push($str,$boggle[$i][$j]);
    if(isWord($str)){
        echo implode('',$str) . "<br/>";
    }
    for ($row = $i - 1; $row <= $i + 1 && $row < SIZE; $row++)
        for ($col = $j - 1; $col <= $j + 1 && $col < SIZE; $col++)
            if ($row >= 0 && $col >= 0 && !$visited[$row][$col])
                findWordsUtil($boggle, $visited, $row, $col, $str);
    
    array_pop($str);
    $visited[$i][$j] = 0;
}

function findWords($boggle){
    $visited = array_fill(0,SIZE,array_fill(0,SIZE,0));
    $str = array();
    for($i = 0; $i < SIZE; $i++){
        for($j = 0; $j < SIZE; $j++){
            findWordsUtil($boggle,$visited,$i,$j,$str);
        }
    }
}

$boggle = [ 
    [ 'G', 'I', 'Z' ],
    [ 'U', 'E', 'K' ],
    [ 'Q', 'S', 'E' ] 
];
 
echo "Following words of dictionary are present.<br/>";
findWords($boggle);