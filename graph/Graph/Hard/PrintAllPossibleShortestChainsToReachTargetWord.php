<?php

function addWord($word,&$dict){
    $res = array();
    $word = str_split($word);
    for($i= 0; $i < sizeof($word); $i++){
        $s = $word[$i];
        for($char = ord('a'); $char <= ord('z'); $char++){
            $word[$i] = $char;
            if(in_array($word,$dict)){
                array_push($res,$word);
            }
        }
        $word[$i] = $s;
    }
    return $res;
}

function findLadders($dict,$beginWord,$endWord){
    $res = $visit = array();
    $unique_dict = array_unique($dict);
    $queue = new SplQueue;
    $queue->enqueue([$beginWord]);
    $flag = false;
    while(!$queue->isEmpty()){
        $size = $queue->count();
        for($i = 0; $i < $size; $i++){
            $cur = $queue->dequeue();
            $newAdd = array();
            $newadd = addWord($cur, $unique_dict);
            for($j = 0; $j < sizeof($newAdd); $j++){
                $newLine = $cur;
                array_push($newLine,$newAdd[$j]);
                if((string)$newadd[$j] == $endWord){
                    $flag = true;
                    array_push($res,$newLine);
                }
                array_push($visit,$newadd[$j]);
                $queue->enqueue($newLine);
            }
        }
        if ($flag) {
            break;
        }
        foreach($visit as $it) {
            unset($unique_dict[array_keys($unique_dict,$it)]);
        }
        $visit = array();
    }
    return $res;
}

function displaypath($res){
    echo "<pre>";
    print_r($res);
}

$str = [ "ted", "tex", "red", "tax", "tad", "den", "rex", "pee" ];
$beginWord = "red";
$endWord = "tax";
$res = findLadders($str, $beginWord, $endWord);
displaypath($res);