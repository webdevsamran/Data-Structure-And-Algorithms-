<?php

define('N', 4);

function printSolution($sol)
{
    for ($x = 0; $x < N; $x++) {
        for ($y = 0; $y < N; $y++)
            echo " &nbsp;&nbsp;&nbsp;" . $sol[$x][$y] . " ";
        echo "<br/>";
    }
}

function isSafe($x, $y, $maze)
{
    if ($x >= 0 && $y >= 0 && $x < N && $y < N && $maze[$x][$y] == 1) {
        return true;
    }
    return false;
}

function solveMaze($maze)
{
    $sol = array_fill(0, N, array_fill(0, N, 0));
    if (solveMazeUtil($maze, 0, 0, $sol) == false) {
        echo "Solution doesn't exist. <br/>";
        return false;
    }
    printSolution($sol);
    return;
}

function solveMazeUtil($maze, $x, $y, &$sol)
{
    if ($x == N - 1 && $y == N - 1 && $maze[$x][$y] == 1) {
        $sol[$x][$y] = 1;
        return true;
    }
    if (isSafe($x, $y, $maze) == true) {
        if ($sol[$x][$y] == 1) {
            return false;
        }
        $sol[$x][$y] = 1;
        if (solveMazeUtil($maze, $x + 1, $y, $sol) == true) {
            return true;
        }
        if (solveMazeUtil($maze, $x - 1, $y, $sol) == true) {
            return true;
        }
        if (solveMazeUtil($maze, $x, $y + 1, $sol) == true) {
            return true;
        }
        if (solveMazeUtil($maze, $x, $y - 1, $sol) == true) {
            return true;
        }
        $sol[$x][$y] = 0;
        return false;
    }
    return false;
}

$maze = [
    [1, 0, 0, 0],
    [1, 1, 0, 1],
    [0, 1, 0, 0],
    [1, 1, 1, 1]
];
solveMaze($maze);
