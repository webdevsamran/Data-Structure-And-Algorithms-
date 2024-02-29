<?php

class Box{
    public $length;
    public $width;
    public $height;

    function __construct($length,$width,$height)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }
}

function compare($a,$b){
    return ($a->length * $a->width > $b->width * $b->length);
}

function findMaxHeight($boxes, $bottom_box_index, $idx, &$dp){
    if($idx < 0){
        return 0;
    }
    if($dp[$idx] != -1){
        return $dp[$idx];
    }
    $maximumHeight = 0;
    for($i = $idx; $i >= 0; $i--){
        if($bottom_box_index == -1 || ($boxes[$i]->length < $boxes[$bottom_box_index]->length && $boxes[$i]->width < $boxes[$bottom_box_index]->width)){
            $maximumHeight = max($maximumHeight, findMaxHeight($boxes,$i,$i-1,$dp) + $boxes[$i]->height);
        }
    }
    return $dp[$idx] = $maximumHeight;
}

function maxStackHeight($height, $length, $width, $n){
    $boxes = array();
    $dp = array_fill(0,303,-1);
    for($i = 0; $i < $n; $i++){
        $box = new Box(max($length[$i],$width[$i]),min($length[$i],$width[$i]),$height[$i]);
        array_push($boxes,$box);
        $box = new Box(max($length[$i],$height[$i]),min($length[$i],$height[$i]),$width[$i]);
        array_push($boxes,$box);
        $box = new Box(max($width[$i],$height[$i]),min($width[$i],$height[$i]),$length[$i]);
        array_push($boxes,$box);
    }
    usort($boxes,"compare");
    return findMaxHeight($boxes, -1, sizeof($boxes) - 1,$dp);
}

$length = [ 4, 1, 4, 10 ];
$width = [ 6, 2, 5, 12 ];
$height = [ 7, 3, 6, 32 ];
$n = sizeof($length);
printf("The maximum possible height of stack is %d", maxStackHeight($height, $length, $width, $n));