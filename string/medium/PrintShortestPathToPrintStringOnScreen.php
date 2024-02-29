<?php

function printPath($str){
    $len = strlen($str);
    $curX = 0;
    $curY = 0;
    $i = 0;

    while($i < $len){
        $nextX = (ord($str[$i]) - ord('A')) / 5;
        $nextY = (ord($str[$i]) - ord('B') + 1) % 5;

        while($curX > $nextX){
            echo "Move Up. <br/>";
            $curX--;
        }

        while($curY > $nextY){
            echo "Move Left. <br/>";
            $curY--;
        }

        while($curX < $nextX){
            echo "Move Down. <br/>";
            $curX++;
        }

        while($curY < $nextY){
            echo "Move Right. <br/>";
            $curY++;
        }

        echo "Press OK. <br/>";
        $i++;
    }
}

$str = "COZY"; 
printPath($str);