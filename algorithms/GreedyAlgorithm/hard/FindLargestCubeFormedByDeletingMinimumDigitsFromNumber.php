<?php

function preProcesse($n){
    $preProcessedCubes = array();
    for($i = 1; $i * $i * $i <= $n; $i++){
        $iCube = $i * $i * $i;
        array_push($preProcessedCubes,$iCube);
    }
    return $preProcessedCubes;
}

function findLargestCubeUtil($num,$preProcessedCubes){
    rsort($preProcessedCubes);
    $totalCubes = sizeof($preProcessedCubes);
    for($i = 0; $i < $totalCubes; $i++){
        $currCube = str_split($preProcessedCubes[$i]);
        $digitLen = sizeof($currCube);
        $index = 0;
        $numLen = sizeof($num);
        for($j = 0; $j < $numLen; $j++){
            if($num[$j] == $currCube[$index]){
                $index++;
            }
            if($digitLen == $index){
                return implode('',$currCube);
            }
        }
    }
    return "Not Possible";
}

function findLargestCube($n){
    $preProcessedCubes  = preProcesse($n);
    $num = str_split($n);
    $ans = findLargestCubeUtil($num,$preProcessedCubes);
    echo "Largest Cube that can be formed from " . $n . " is " . $ans . "<br/>";
}

$n = 4125;
findLargestCube($n);

$n = 876;
findLargestCube($n);