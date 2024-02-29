<?php

function generateSquare($size){
    $magicSqaure = array_fill(0,$size,array_fill(0,$size,0));
    $i = (int)($size / 2);
    $j = $size - 1;
    
    for($num = 1; $num <= $size * $size;){
        if($i == -1 && $j == $size){
            $j = $size - 2;
            $i = 0;
        }else{
            if($j == $size){
                $j = 0;
            }
            if($i < 0){
                $i = $size - 1;
            }
        }
        if($magicSqaure[$i][$j]){
            $j -= 2;
            $i++;
            continue;
        }else{
            $magicSqaure[$i][$j] = $num++;
        }
        $j++;
        $i--;
    }
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++)
            echo $magicSqaure[$i][$j] . " ";
        echo "<br/>";
    }
}

$n = 7;
generateSquare($n);