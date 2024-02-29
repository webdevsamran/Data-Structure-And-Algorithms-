<?php

function countkDist($str,$k){
    $n = strlen($str);
    $res = 0;
    $nt = 26;
    for($i = 0; $i < $n; $i++){
        $dist_count = 0;
        $cnt = array_fill(0,$nt,0);
        for($j = $i; $j < $n; $j++){
            if($cnt[(ord($str[$j]) - ord('a'))] == 0){
                $dist_count++;
            }
            $cnt[(ord($str[$j]) - ord('a'))]++;
            if($dist_count == $k){
                $res++;
            }
            if($dist_count > $k){
                break;
            }
        }
    }
    return $res;
}

$str = "abcbaa";
$k = 3;
echo "Total substrings with exactly " . $k . " distinct characters : " . countkDist($str, $k);