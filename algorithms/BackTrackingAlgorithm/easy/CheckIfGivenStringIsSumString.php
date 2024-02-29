<?php

function swap(&$a,&$b){
    $temp = $a;
    $a = $b;
    $b = $temp;
}

function str_sum($str1,$str2){
    if(strlen($str1) < strlen($str2)){
        swap($str1,$str2);
    }
    $m = strlen($str1);
    $n = strlen($str2);
    $ans = '';
    $carry = 0;
    $str1 = str_split($str1);
    $str2 = str_split($str2);
    for($i = 0; $i < $n; $i++){
        $ds = (($str1[$m - 1 - $i]) + ($str2[$n - 1 - $i]) + $carry) % 10;
        $carry = (($str1[$m - 1 - $i]) + ($str2[$n - 1 - $i]) + $carry) / 10;
        $ans = ($ds) . $ans;
    }
    for ($i = $n; $i < $m; $i++) {
        $ds = ($str1[$m - 1 - $i] + $carry) % 10;
        $carry = ($str1[$m - 1 - $i] + $carry) / 10;
        $ans = ($ds) . $ans;
    }
 
    if ($carry)
        $ans = ($carry) . $ans;
    return $ans;
}

function checkSumStrUtil($str,$beg,$len1,$len2){
    $s1 = substr($str,$beg,$len1);
    $s2 = substr($str,$beg+$len1,$len2);
    $s3 = str_sum($s1,$s2);
    $s3_len = strlen($s3);

    if ($s3_len > strlen($str) - $len1 - $len2 - $beg)
        return false;
 
    if ($s3 == substr($str,$beg + $len1 + $len2, $s3_len)) {

        if ($beg + $len1 + $len2 + $s3_len == strlen($str))
            return true;

        return checkSumStrUtil($str, $beg + $len1, $len2, $s3_len);
    }

    return false;
}

function isSumStr($str){
    $len = strlen($str);
    for($i = 1; $i < $len; $i++){
        for($j = 1; $i + $j < $len; $j++){
            if(checkSumStrUtil($str,0,$i,$j)){
                return true;
            }
        }
    }
    return false;
}

$result = NULL;
 
$result = isSumStr("1212243660");
echo ($result == 1 ? "True<br/>" : "False<br/>");
    
$result = isSumStr("123456787");
echo ($result == 1 ? "True<br/>" : "False<br/>");