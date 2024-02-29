<?php

define('N',4);

function isSafe($maze,$x,$y){
    if($x >= 0 && $y >= 0 && $x < N && $y < N && $maze[$x][$y] != 0){
        return true;
    }
    return false;
}

function solveMazeUtil($maze,$x,$y,&$sol){
    if($x == N - 1 && $y == N - 1){
        $sol[$x][$y] = 1;
        return true;
    }
    if(isSafe($maze,$x,$y)){
        $sol[$x][$y] = 1;
        for($i = 1; $i < N && $i <= $maze[$x][$y]; $i++){
            if(solveMazeUtil($maze,$x+$i,$y,$sol)){
                return true;
            }
            if(solveMazeUtil($maze,$x,$y+$i,$sol)){
                return true;
            }
        }
        $sol[$x][$y] = 0;
        return false;
    }
    return false;
}

function printSolution($sol)
{
    for ($i = 0; $i < N; $i++) {
        for ($j = 0; $j < N; $j++)
            printf(" %d ", $sol[$i][$j]);
        printf("<br/>");
    }
}

function solveMaze($maze){
    $sol = array_fill(0,N,array_fill(0,N,0));
    if (solveMazeUtil($maze, 0, 0, $sol) == false) {
        printf("Solution doesn't exist");
        return false;
    }
 
    printSolution($sol);
    return true;
}

$maze = [ 
    [ 2, 1, 0, 0 ],
    [ 3, 0, 0, 1 ],
    [ 0, 1, 0, 1 ],
    [ 0, 0, 0, 1 ] 
];
 
solveMaze($maze);