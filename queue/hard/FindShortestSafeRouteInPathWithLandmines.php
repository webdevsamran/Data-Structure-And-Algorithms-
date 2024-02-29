<?php

define('R',12);
define('C',10);

$rowNum = [ -1, 0, 0, 1 ];
$colNum = [ 0, -1, 1, 0 ];

function isSafe($mat, $visited, $x, $y)
{
    if ($mat[$x][$y] == 0 || $visited[$x][$y])
        return false;
    return true;
}

function isValid($x, $y)
{
    if ($x < R && $y < C && $x >= 0 && $y >= 0)
        return true;
 
    return false;
}

function markUnsafeCells(&$mat)
{
    global $rowNum;
    global $colNum;
    for ($i = 0; $i < R; $i++)
    {
        for ($j = 0; $j < C; $j++)
        {
            if ($mat[$i][$j] == 0)
            {
              for ($k = 0; $k < 4; $k++)
                if (isValid($i + $rowNum[$k], $j + $colNum[$k]))
                    $mat[$i + $rowNum[$k]][$j + $colNum[$k]] = -1;
            }
        }
    }
    for ($i = 0; $i < R; $i++)
    {
        for ($j = 0; $j < C; $j++)
        {
            if ($mat[$i][$j] == -1)
                $mat[$i][$j] = 0;
        }
    }
}

function findShortestPathUtil($mat, &$visited, $i, $j, &$min_dist, $dist)
{
    global $rowNum;
    global $colNum;
    if ($j == C-1)
    {
        $min_dist = min($dist, $min_dist);
        return;
    }
    if ($dist > $min_dist)
        return;
    $visited[$i][$j] = 1;
    for ($k = 0; $k < 4; $k++)
    {
        if (isValid($i + $rowNum[$k], $j + $colNum[$k]) && isSafe($mat, $visited, $i + $rowNum[$k], $j + $colNum[$k]))
        {
            findShortestPathUtil($mat, $visited, $i + $rowNum[$k], $j + $colNum[$k], $min_dist, $dist + 1);
        }
    }
    $visited[$i][$j] = 0;
}

function findShortestPath(&$mat)
{
    $min_dist = PHP_INT_MAX;
    $visited = array();
    markUnsafeCells($mat);
    for ($i = 0; $i < R; $i++)
    {
        if ($mat[$i][0] == 1)
        {
            $visited = array_fill(0,R,array_fill(0,C,0));
            findShortestPathUtil($mat, $visited, $i, 0, $min_dist, 0);
            if($min_dist == C - 1)
                break;
        }
    }
    if ($min_dist != PHP_INT_MAX)
        echo "Length of shortest safe route is " . $min_dist;
    else
        echo "Destination not reachable from given source";
}

$mat =
[
    [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
    [ 1, 0, 1, 1, 1, 1, 1, 1, 1, 1 ],
    [ 1, 1, 1, 0, 1, 1, 1, 1, 1, 1 ],
    [ 1, 1, 1, 1, 0, 1, 1, 1, 1, 1 ],
    [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
    [ 1, 1, 1, 1, 1, 0, 1, 1, 1, 1 ],
    [ 1, 0, 1, 1, 1, 1, 1, 1, 0, 1 ],
    [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
    [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
    [ 0, 1, 1, 1, 1, 0, 1, 1, 1, 1 ],
    [ 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ],
    [ 1, 1, 1, 0, 1, 1, 1, 1, 1, 1 ]
];

findShortestPath($mat);