<?php

define('MAXN',10000);
define('SQRSIZE',100);

$arr = array();
$block = array();
$blk_size = NULL;

function preprocess($input,$n){
    global $arr;
    global $block;
    global $blk_size;
    $blk_dx = -1;
    $blk_size = sqrt($n);
    for($i = 0; $i < $n; $i++){
        $arr[$i] = $input[$i];
        if($i % $blk_size == 0){
            $blk_dx++;
        }
        $block[$blk_dx] += $arr[$i];
    }
}

function update($idx,$val){
    global $arr;
    global $block;
    global $blk_size;
    $blockNumber = (int)($idx/$blk_size);
    $block[$blockNumber] += $val - $arr[$idx];
    $arr[$idx] = $val;
}

function query($l,$r){
    global $arr;
    global $block;
    global $blk_size;
    $sum = 0;
    while($l < $r && $l % $blk_size != 0 && $l != 0){
        $sum += $arr[$l];
        $l++;
    }
    while($l + $blk_size - 1 <= $r){
        $sum += $block[(int)($l / $blk_size)];
        $l += $blk_size;
    }
    while($l <= $r){
        $sum += $arr[$l];
        $l++;
    }
    return $sum;
}

$input = [ 1, 5, 2, 4, 6, 1, 3, 5, 7, 10 ];
$n = sizeof($input);

preprocess($input, $n);

echo "query(3,8) : " . query(3, 8) . "<br/>";
echo "query(1,6) : " . query(1, 6) . "<br/>";
update(8, 0);
echo "query(8,8) : " . query(8, 8) . "<br/>";