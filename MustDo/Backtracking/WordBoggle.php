<?php

define('SIZE',3);

function dfs(&$boggle, $s, $i, $j, $idx){
    if($i < 0 || $j < 0 || $i >= SIZE || $j >= SIZE){
        return false;
    }
    if($s[$idx] != $boggle[$i][$j]){
        return false;
    }
    if($idx == strlen($s) - 1){
        return true;
    }
    $temp = $boggle[$i][$j];
    $boggle[$i][$j] = '*';

    $a = dfs($boggle,$s,$i,$j+1,$idx+1);
    $b = dfs($boggle,$s,$i,$j-1,$idx+1);
    $c = dfs($boggle,$s,$i+1,$j,$idx+1);
    $d = dfs($boggle,$s,$i-1,$j,$idx+1);
    $e = dfs($boggle,$s,$i+1,$j+1,$idx+1);
    $f = dfs($boggle,$s,$i-1,$j+1,$idx+1);
    $g = dfs($boggle,$s,$i+1,$j-1,$idx+1);
    $h = dfs($boggle,$s,$i-1,$j-1,$idx+1);

    $boggle[$i][$j] = $temp;
    return $a || $b || $c || $e || $f || $g || $h || $d;
}

function wordBoggle($boggle, $dictionary){
    $store = array();
    for($i = 0; $i < sizeof($dictionary); $i++){
        $s = $dictionary[$i];
        $l = strlen($s);
        for($j = 0 ; $j < SIZE; $j++){
            for($k = 0; $k < SIZE; $k++){
                if(dfs($boggle, $s, $j, $k, 0)){
                    if(!in_array($s,$store)){
                        array_push($store,$s);
                    }
                }
            }
        }
    }
    echo "<pre>";
    print_r($store);
}

$boggle = [
    [ 'G', 'I', 'Z' ],
    [ 'U', 'E', 'K' ],
    [ 'Q', 'S', 'E' ]
];
$dictionary = [ "GEEKS", "FOR", "QUIZ", "GO" ];
echo "Following words of dictionary are present<br/>";
wordBoggle($boggle, $dictionary);