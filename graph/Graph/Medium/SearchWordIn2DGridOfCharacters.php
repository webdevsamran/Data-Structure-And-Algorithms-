<?php

class Solution{
    public $mover;
    public $board;

    function __construct()
    {
        $this->mover = [ 
            [ 1, 0 ],
            [ 0, 1 ],
            [ -1, 0 ],
            [ 0, -1 ],
            [ 1, 1 ],
            [ -1, -1 ],
            [ 1, -1 ],
            [ -1, 1 ]
        ];
        $this->board = array();
    }

    private function dfs($x, $y, &$s, &$vis){
        if(strlen($s) == 0){
            return true;
        }
        $vis[$x][$y] = true;
        $sol = false;
        for($i = 0; $i < sizeof($this->mover); $i++){
            $curr_x = $x + $this->mover[$i][0];
            $curr_y = $y + $this->mover[$i][1];
            if($curr_x >= 0 && $curr_x  < sizeof($this->board) && $curr_y >= 0 && $curr_y < sizeof($this->board[0])){
                if($this->board[$curr_x][$curr_y] == $s[0] && !$vis[$curr_x][$curr_y]){
                    $k = substr($s,1);
                    $sol |= $this->dfs($curr_x,$curr_y,$k,$vis);
                }
            }
        }
        $vis[$x][$y] = false;
        return $sol;
    }

    function findWords($board,$words){
        $this->board = $board;
        $ans = array();
        $vis = array_fill(0,sizeof($board),array_fill(0,sizeof($board[0]),0));
        foreach($words as $word){
            for($i = 0; $i < sizeof($board); $i++){
                for($j = 0; $j < sizeof($board[$i]); $j++){
                    if($board[$i][$j] == $word[0]){
                        $s = substr($word,1);
                        if($this->dfs($i, $j, $s, $vis)){
                            array_push($ans, ($word . "->{" . $i . "," . $j . "}"));
                        }
                    }
                }
                if(sizeof($ans) && $word == $ans[array_key_last($ans)]){
                    break;
                }
            }
        }
        return $ans;
    }
}

$solver = new Solution;
$board = [ 
    [ 'o', 'a', 'a', 'n' ],
    [ 'e', 't', 'a', 'e' ],
    [ 'i', 'h', 'k', 'r' ],
    [ 'i', 'f', 'l', 'v' ]
];
$words = [ "oath", "pea", "eat", "rain" ];
$ans = $solver->findWords($board, $words);
foreach ($ans as $part)
    echo $part . "<br/>";