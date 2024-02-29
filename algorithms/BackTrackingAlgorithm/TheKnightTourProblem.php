<?php

define('N', 8);

function printSolution($sol)
{
    for ($x = 0; $x < N; $x++) {
        for ($y = 0; $y < N; $y++)
            echo " &nbsp;&nbsp;&nbsp;" . $sol[$x][$y] . " ";
        echo "<br/>";
    }
}

function isSafe($x, $y, $sol)
{
    return ($x >= 0 && $y >= 0 && $x < N && $y < N && $sol[$x][$y] == -1);
}

function solveKTUtil($x, $y, $movei, &$sol, $xMove, $yMove)
{
    if ($movei == N * N) {
        return 1;
    }
    for ($k = 0; $k < 8; $k++) {
        $next_x = $x + $xMove[$k];
        $next_y = $y + $yMove[$k];
        if (isSafe($next_x, $next_y, $sol)) {
            $sol[$next_x][$next_y] = $movei;
            if (solveKTUtil($next_x, $next_y, $movei + 1, $sol, $xMove, $yMove) == 1) {
                return 1;
            } else {
                $sol[$next_x][$next_y] = -1;
            }
        }
    }
    return 0;
}

function solveKT()
{
    $sol = array_fill(0, N, array_fill(0, N, -1));
    $sol[0][0] = 0;
    $xMove = [2, 1, -1, -2, -2, -1, 1, 2];
    $yMove = [1, 2, 2, 1, -1, -2, -2, -1];

    if (solveKTUtil(0, 0, 1, $sol, $xMove, $yMove) == 0) {
        echo "Solution doesn't exisit.<br/>";
        return;
    }
    printSolution($sol);
    return;
}

solveKT();
