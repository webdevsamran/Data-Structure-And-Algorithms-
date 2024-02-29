<?php

function getZARR($concat,&$zArr){
    $len = strlen($concat);
    $L = $R = 0;
    $k = NULL;

    for($i = 1; $i < $len; $i++){
        if($i > $R){
            $L = $R = $i;
            
            while($R < $len && $concat[$R - $L] == $concat[$R]){
                $R++;
            }
            $zArr[$i] = $R-$L;
            $R--;
        }else{
            $k = $i - $L;
            if($zArr[$k] < $R - $i + 1){
                $zArr[$i] = $zArr[$k];
            }else{
                $L = $i;
                while($R < $len && $concat[$R - $L] == $concat[$R]){
                    $R++;
                }
                $zArr[$i] = $R-$L;
                $R--;
            }
        }
    }
}

function searchPattern($text,$pattern){
    $concat = $pattern."$".$text;
    $len = strlen($concat);
    $zArr = new SplFixedArray($len);
    
    getZARR($concat,$zArr);
    echo "<pre>";
    print_r($zArr);
    echo "<br/>";

    for($i = 0; $i < $len; $i++){
        if($zArr[$i] == strlen($pattern)){
            echo "Pattern Found at Position ".($i - strlen($pattern) - 1).".<br/>";
        }
    }
}

$text = "GEEKS FOR GEEKS";
$pattern = "GEEK";
searchPattern($text, $pattern);