<?php

function probability($map,$len,$s){
    $count_odd = 0;
    for($i = 0; $i < $len; $i++){
        if($map[$s[$i]] & 1){
            $count_odd++;
        }
        if($count_odd > 1){
            return false;
        }
    }
    return true;
}

function largestPalindrome($s){
    $len = strlen($s);
    $s = str_split($s);
    $map = array();
    
    for($i = 0; $i < $len; $i++){
        if(!array_key_exists($s[$i],$map)){
            $map[$s[$i]] = 0;
        }
        $map[$s[$i]]++;
    }

    if(probability($map,$len,$s) == false){
        echo "Palindrome can't be formed.<br/>";
        return;
    }

    $largest = array_fill(0,$len,0);
    $front = 0;

    for($i = 9; $i >= 0; $i--){
        if(!array_key_exists($i,$map)){
            continue;
        }
        if($map[$i] & 1){
            $largest[(int)($len/2)] = $i;
            $map[$i]--;
            while($map[$i] > 0){
                $largest[$front] = $i;
                $largest[$len-1-$front] = $i;
                $map[$i] -= 2;
                $front++;
            }
        }else{
            while($map[$i] > 0){
                $largest[$front] = $i;
                $largest[$len-1-$front] = $i;
                $map[$i] -= 2;
                $front++;
            }
        }
    }

    echo implode('',$largest);
}

$s = "313551";
largestPalindrome($s);