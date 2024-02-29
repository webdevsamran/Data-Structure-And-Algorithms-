<?php

define('MAX',1000);
$tree = array();
$arr = NULL;

function lcm($a,$b){
    return (int)($a * $b / gmp_intval(gmp_gcd($a, $b)));
}

function build($node,$start,$end){
    global $arr;
    global $tree;
    if($start == $end){
        $tree[$node] = $arr[$start];
        return;
    }
    $mid = (int)(($start + $end) / 2);
    build(2*$node,$start,$mid);
    build(2*$node+1,$mid+1,$end);
    $left_lcm = $tree[2*$node];
    $right_lcm = $tree[2*$node+1];
    $tree[$node] = lcm($left_lcm,$right_lcm);
}

function query($node,$start,$end,$l,$r){
    global $arr;
    global $tree;
    if($end < $l || $start > $r){
        return 1;
    }
    if($l <= $start && $r >= $end){
        return $tree[$node];
    }
    $mid = (int)(($start + $end) / 2);
    $left_lcm = query(2 * $node, $start, $mid, $l, $r);
    $right_lcm = query(2 * $node + 1, $mid + 1, $end, $l, $r);
    return lcm($left_lcm, $right_lcm);
}

$arr = [5, 7, 5, 2, 10, 12 ,11, 17, 14, 1, 44];
$queries = [[2, 5], [5, 10], [0, 10]];

build(1, 0, 10);
echo query(1, 0, 10, 2, 5) . "<br/>";
echo query(1, 0, 10, 5, 10) . "<br/>";
echo query(1, 0, 10, 0, 10) . "<br/>";