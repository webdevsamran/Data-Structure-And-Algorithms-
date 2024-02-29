<?php

define('M',26);

function waysToIncreaseLCSBy1($str1,$str2){
    $m = strlen($str1);
    $n = strlen($str2);
    $position = array();
    for($i = 1 ; $i <= $n; $i++){
        if(!array_key_exists($str2[$i],$position)){
            $position[$str2[$i-1]][] = $i;
            continue;
        }
        $position[$str2[$i-1]][] = $i;
    }

    $lcsl = array();
    $lcsr = array();

    for($i = 0; $i <= $m + 1; $i++){
        for($j = 0; $j <= $n + 1; $j++){
            $lcsl[$i][$j] = $lcsr[$i][$j] = 0;
        }
    }

    for ($i = 1; $i <= $m; $i++)
    {
        for ($j = 1; $j <= $n; $j++)
        {
            if ($str1[$i-1] == $str2[$j-1])
                $lcsl[$i][$j] = 1 + $lcsl[$i-1][$j-1];
            else
                $lcsl[$i][$j] = max($lcsl[$i-1][$j], $lcsl[$i][$j-1]);
        }
    }

    for ($i = $m; $i >= 1; $i--)
    {
        for ($j = $n; $j >= 1; $j--)
        {
            if ($str1[$i-1] == $str2[$j-1])
                $lcsr[$i][$j] = 1 + $lcsr[$i+1][$j+1];
            else
                $lcsr[$i][$j] = max($lcsr[$i+1][$j], $lcsr[$i][$j+1]);
        }
    }

    $ways = 0;
    for ($i=0; $i <= $m; $i++)
    {
        for ($c=ord('a'); $c <= ord('z'); $c++)
        {
            if(!array_key_exists(chr($c),$position)){
                continue;
            }
            for ($j = 0; $j < sizeof($position[chr($c)]); $j++)
            {
                $p = $position[chr($c)][$j];
                if ($lcsl[$i][$p-1] + $lcsr[$i+1][$p+1] == $lcsl[$m][$n])
                    $ways++;
            }
        }
    }
 
    return $ways;
}

$str1 = "abcabc";
$str2 = "abcd";
echo waysToIncreaseLCSBy1($str1, $str2);