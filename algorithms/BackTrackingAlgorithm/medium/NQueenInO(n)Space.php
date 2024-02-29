<?php
error_reporting(0);
define('breakline',"<br/><p>--------------------</p><br/>");
define('MAX',10);
$arr = array();
$no = 0;

function canPlace($k,$i){
    global $arr;
    for($j = 1; $j < $k; $j++){
        if($arr[$j] == $i || (abs($arr[$j] - $i) == abs($j - $k))){
            return false;
        }
    }
    return true;
}

function display($n){
    global $arr;
    global $no;
    breakline;
    echo "Assignment No: ". ++$no."<br/>";
    breakline;
    for ($i = 1; $i <= $n; $i++){
        for ($j = 1; $j <= $n; $j++){
            if ($arr[$i] != $j)
                echo "\t_";
            else
                echo "\tQ";
        }
        echo "<br/>";
    }
    breakline;
}

function nQueens($k,$n){
    global $arr;
    for($i = 1; $i <= $n ; $i++){
        if(canPlace($k,$i)){
            $arr[$k] = $i;
            if($k == $n){
                display($n);
            }else{
                nQueens($k+1,$n);
            }
        }
    }
}

$n = 4;   
nQueens(1, $n);   