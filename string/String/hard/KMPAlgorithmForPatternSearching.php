<?php

function computeLPSArray($pat,$m,&$lsp){
    $len = 0;
    $lsp[0] = 0;
    $i = 1;
    while($i < $m){
        if($pat[$i] == $pat[$len]){
            $len++;
            $lsp[$i] = $len;
            $i++;
        }else{
            if($len != 0){
                $len = $lsp[$len - 1];
            }else{
                $lsp[$i] = 0;
                $i++;
            }
        }
    }
}

function KMPSearch($pat,$txt){
    $m = strlen($pat);
    $n = strlen($txt);
    $lsp = array();
    computeLPSArray($pat,$m,$lsp);
    $i = 0;
    $j = 0;
    while(($n - $i) >= ($m - $j)){
        if($pat[$j] == $txt[$i]){
            $i++;
            $j++;
        }
        if($j == $m){
            echo "Found pattern at index %d " . ($i - $j);
            $j = $lsp[$j - 1];
        }else if($i < $n && $pat[$j] != $txt[$i]){
            if($j != 0){
                $j = $lsp[$j - 1];
            }else{
                $i++;
            }
        }
    }
}

$txt = "ABABDABACDABABCABAB";
$pat = "ABABCABAB";
KMPSearch($pat, $txt);