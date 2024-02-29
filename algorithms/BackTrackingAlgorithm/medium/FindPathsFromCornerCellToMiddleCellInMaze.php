<?php

define('N',9);

$row = [-1, 1, 0, 0];
$col = [0, 0, -1, 1];

$_row = [ 0, 0, N-1, N-1];
$_col = [ 0, N-1, 0, N-1];

function isValid($visited,$pt){
    return ($pt[0] >= 0) && ($pt[0]  < N) && ($pt[1] >= 0) && ($pt[1] < N) && !in_array($pt,$visited);
}

function findPathInMazeUtil($maze,&$path,&$visited,&$pt){
    global $row;
    global $col;
    if($pt[0] == (int)(N / 2) && $pt[1] == (int)(N / 2)){
        printPath($path);
        return;
    }
    for($i = 0; $i < 4; $i++){
        $n = $maze[$pt[0]][$pt[1]];
        $x = $pt[0] + $row[$i]*$n;
        $y = $pt[1] + $col[$i]*$n;
        $next = [$x,$y];
        if(isValid($visited,$next)){
            array_push($visited,$next);
            array_push($path,$next);
            findPathInMazeUtil($maze, $path, $visited, $next);
            array_pop($path);
            unset($visited[array_search($next,$visited)]);
        }
    }
}

function findPathInMaze($maze){
    global $_row;
    global $_col;
    $path = array();
    $visited = array();

    for($i = 0; $i < 4; $i++){
        $x = $_row[$i];
        $y = $_col[$i];
        $pt = [$x,$y];
        array_push($visited,$pt);
        array_push($path,$pt);
        findPathInMazeUtil($maze, $path, $visited, $pt);
        array_pop($path);
        unset($visited[array_search($pt,$visited)]);
    }
}

function printPath($path)
{
    foreach($path as $data){
        echo "(" . $data[0] . ", " . $data[1] . ") -> ";
    }
    echo "MID<br/><br/>";
}

$maze = [
    [ 3, 5, 4, 4, 7, 3, 4, 6, 3 ],
    [ 6, 7, 5, 6, 6, 2, 6, 6, 2 ],
    [ 3, 3, 4, 3, 2, 5, 4, 7, 2 ],
    [ 6, 5, 5, 1, 2, 3, 6, 5, 6 ],
    [ 3, 3, 4, 3, 0, 1, 4, 3, 4 ],
    [ 3, 5, 4, 3, 2, 2, 3, 3, 5 ],
    [ 3, 5, 4, 3, 2, 6, 4, 4, 3 ],
    [ 3, 5, 1, 3, 7, 5, 3, 6, 4 ],
    [ 6, 2, 4, 3, 4, 5, 4, 5, 1 ]
];
 
findPathInMaze($maze);