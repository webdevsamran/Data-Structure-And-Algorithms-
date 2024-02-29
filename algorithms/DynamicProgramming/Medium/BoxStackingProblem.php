<?php

class Box{
    public $length;
    public $width;
    public $height;
}

$dp = array_fill(0,333,-1);

function findMaxHeight(&$boxes, $bottom_box_index, $index){
    global $dp;
    if($index < 0){
        return 0;
    }
    if($dp[$index] != -1){
        return $dp[$index];
    }
    $maxHeight = 0;
    for($i = $index; $i >= 0; $i--){
        if($bottom_box_index == -1 || ($boxes[$i]->length < $boxes[$bottom_box_index]->length && $boxes[$i]->width < $boxes[$bottom_box_index]->width)){
            $maxHeight = max($maxHeight, findMaxHeight($boxes,$i,$i-1) + $boxes[$i]->height);
        }
    }
    return $dp[$index] = $maxHeight;
}

function sortBoxes($a,$b){
    return ($a->length * $a->width) > ($b->width * $b->length);
}

function maxStackHeight($height, $length, $width, $n){
    $boxes = array();
    for($i = 0; $i < $n; $i++){
        // copy original box
        $box = new Box;
        $box->height = $height[$i];
        $box->length = max($length[$i], $width[$i]);
        $box->width = min($length[$i], $width[$i]); 
        array_push($boxes,$box);

        // First rotation of box
        $box = new Box;
        $box->height = $width[$i];
        $box->length = max($length[$i], $height[$i]);
        $box->width = min($length[$i], $height[$i]);
        array_push($boxes,$box);
 
        // Second rotation of box
        $box = new Box;
        $box->height = $length[$i];
        $box->length = max($width[$i], $height[$i]);
        $box->width = min($width[$i], $height[$i]);
        array_push($boxes,$box);
    }
    usort($boxes,'sortBoxes');
    echo "<pre>";
    print_r($boxes);
    return findMaxHeight($boxes, -1, sizeof($boxes) - 1);
}

$length = [ 4, 1, 4, 10 ];
$width = [ 6, 2, 5, 12 ];
$height = [ 7, 3, 6, 32 ];
$n = sizeof($length);
printf("The maximum possible height of stack is %d<br/>", maxStackHeight($height, $length, $width, $n));