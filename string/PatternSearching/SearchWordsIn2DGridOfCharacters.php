<?php

$mover = [
    [1,0],
    [0,1],
    [-1,0],
    [0,-1],
    [1,1],
    [-1,-1],
    [1,-1],
    [-1,1]
];

function dfs($i,$j,&$s,$visited,$board){
    global $mover;

    if(strlen($s) == 0){
        return true;
    }

    $visited[$i][$j] = true;
    $sol = false;

    for($x = 0; $x < sizeof($mover); $x++){
        $curr_x = $i + $mover[$x][0];
        $curr_y = $j + $mover[$x][1];

        if($curr_x >= 0 && $curr_y >= 0 && $curr_x < sizeof($board) && $curr_y < sizeof($board[0])){
            if($board[$curr_x][$curr_y] == $s[0] && $visited[$curr_x][$curr_y] == 0){
                $k = substr($s,1);
                $sol |= dfs($curr_x,$curr_y,$k,$visited,$board);
            }
        }
    }

    return $sol;
}

function findWords($board,$words){
    $ans = array();
    $visited = array_fill(0,sizeof($board),array_fill(0,sizeof($board[0]),0));

    foreach($words as $word){
        for($i = 0; $i < sizeof($board); $i++){
            for($j = 0; $j < sizeof($board[0]); $j++){
                if($board[$i][$j] == $word[0]){
                    $s = substr($word,1);
                    if(dfs($i,$j,$s,$visited,$board)){
                        array_push($ans,($word."=> {".$i." ".$j."}"));
                    }
                }
            }
            if(sizeof($ans) && $ans[array_key_last($ans)] == $word){
                break;
            }
        }
    }
    
    return $ans;
}

$board = [ 
    [ 'o', 'a', 'a', 'n' ],
    [ 'e', 't', 'a', 'e' ],
    [ 'i', 'h', 'k', 'r' ],
    [ 'i', 'f', 'l', 'v' ]
];
$words = [ "oath", "pea", "eat", "rain" ];
$ans = findWords($board, $words);

foreach($ans as $answer){
    echo $answer."<br/>";
}