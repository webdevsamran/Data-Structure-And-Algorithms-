<?php

define('M',26);

function dfs($g,$u,&$visit){
    $visit[$u] = true;
    for($i = 0; $i < sizeof($g[$u]); $i++){
        if(!$visit[$g[$u][$i]]){
            dfs($g,$g[$u][$i],$visit);
        }
    }
}

function isConnected($g,&$mark,$start){
    $visit = array();
    dfs($g,$start,$visit);
    for ($i = 0; $i < M; $i++)
    {
        if ($mark[$i] && !$visit[$i])
            return false;
    }
    return true;
}

function possibleOrderAmongString($arr,$n){
    $g = array();
    $mark = array();
    $in = $out = array();
    for($i = 0; $i < $n; $i++){
        $word = str_split($arr[$i]);
        $f = ord($word[array_key_first($word)]);
        $l = ord($word[array_key_last($word)]);

        $mark[$f] = $mark[$l] = true;

        $in[$l]++;
        $out[$f]++;
        $g[$f][] = $l;
    }

    foreach($in as $key => $val){
        if($val != $out[$key]){
            return false;
        }
    }

    return isConnected($g, $mark, ord($arr[0][0]));
}

$arr = ["ab", "bc", "cd", "de", "ed", "da"];
$N = sizeof($arr);

if (possibleOrderAmongString($arr, $N) == false)
    echo "Ordering not possible<br/>";
else
    echo "Ordering is possible<br/>";

