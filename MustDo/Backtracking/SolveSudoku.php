<?php

define('N',9);

function UsedInBox($grid,$Boxrow,$Boxcol,$num){
    for($row = 0; $row < 3; $row++){
        for($col = 0; $col < 3; $col++){
            if($grid[$row+$Boxrow][$col+$Boxcol] == $num){
                return true;
            }
        }
    }
    return false;
}

function UsedInColumn($grid,$col,$num){
    for($row = 0; $row < N; $row++){
        if($grid[$row][$col] == $num){
            return true;
        }
    }
    return false;
}

function UsedInRow($grid,$row,$num){
    for($col = 0; $col < N; $col++){
        if($grid[$row][$col] == $num){
            return true;
        }
    }
    return false;
}

function isSafe($grid,$row,$col,$num){
    return !UsedInRow($grid,$row,$num) && !UsedInColumn($grid,$col,$num) && !UsedInBox($grid,$row-$row%3,$col-$col%3,$num) && $grid[$row][$col] == 0;
}

function FindUnassignedLocation($grid,&$row,&$col){
    for($row = 0; $row < N; $row++){
        for($col = 0; $col < N; $col++){
            if($grid[$row][$col] == 0){
                return true;
            }
        }
    }
    return false;
}

function SolveSudoku(&$grid){
    $row = NULL;
    $col = NULL;

    if(!FindUnassignedLocation($grid,$row,$col)){
        return true;
    }

    for($num = 1; $num <= 9; $num++){
        if(isSafe($grid,$row,$col,$num)){
            $grid[$row][$col] = $num;
            if(SolveSudoku($grid)){
                return true;
            }
            $grid[$row][$col] = 0;
        }
    }

    return false;
}

function printGrid($grid)
{
    for ($row = 0; $row < N; $row++)
    {
        for ($col = 0; $col < N; $col++)
            echo $grid[$row][$col] . " ";
        echo "<br/>";
    }
}

$grid = [
    [ 3, 0, 6, 5, 0, 8, 4, 0, 0 ],
    [ 5, 2, 0, 0, 0, 0, 0, 0, 0 ],
    [ 0, 8, 7, 0, 0, 0, 0, 3, 1 ],
    [ 0, 0, 3, 0, 1, 0, 0, 8, 0 ],
    [ 9, 0, 0, 8, 6, 3, 0, 0, 5 ],
    [ 0, 5, 0, 0, 9, 0, 6, 0, 0 ],
    [ 1, 3, 0, 0, 0, 0, 2, 5, 0 ],
    [ 0, 0, 0, 0, 0, 0, 0, 7, 4 ],
    [ 0, 0, 5, 2, 0, 6, 3, 0, 0 ]
];

if (SolveSudoku($grid) == true)
    printGrid($grid);
else
    echo "No solution exists";