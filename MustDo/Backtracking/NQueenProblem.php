<?php

define('N', 4);

function printSolution($sol)
{
    for ($x = 0; $x < N; $x++) {
        for ($y = 0; $y < N; $y++)
            if ($sol[$x][$y]) {
                echo "Q";
            } else {
                echo ". ";
            }
        echo "<br/>";
    }
}

function isSafe($board, $row, $col)
{
    for ($i = 0; $i < $col; $i++) {
        if ($board[$row][$i]) {
            return false;
        }
    }
    for ($i = $row, $j = $col; $i >= 0 && $j >= 0; $i--, $j--) {
        if ($board[$i][$j]) {
            return false;
        }
    }
    for ($i = $row, $j = $col; $i < N && $j >= 0; $i++, $j--) {
        if ($board[$i][$j]) {
            return false;
        }
    }
    return true;
}

function solveNQUtil(&$board, $col)
{
    if ($col >= N) {
        return true;
    }
    for ($i = 0; $i < N; $i++) {
        if (isSafe($board, $i, $col)) {
            $board[$i][$col] = 1;
            if (solveNQUtil($board, $col + 1)) {
                return true;
            }
            $board[$i][$col] = 0;
        }
    }
    return false;
}

function solveNQ()
{
    $board = array_fill(0, N, array_fill(0, N, 0));

    if (solveNQUtil($board, 0) == false) {
        echo "Solution does not exist. <br/>";
        return false;
    }

    printSolution($board);
    return true;
}

solveNQ();
